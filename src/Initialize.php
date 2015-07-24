<?php
namespace VoronoiImageMapPlugin;

class Initialize
{
    protected $_menu;
    protected $_postType;

    public function __construct()
    {
        $acfActive = is_plugin_active('advanced-custom-fields');

        if (!$acfActive){
            add_action('admin_notices', array($this, 'requirementsError'));
            return;
        }

        $this->_menu = new Menu($acfActive);

        $this->_postType = new CustomPostType();
    }

    public function requirementsError()
    {
        include(__DIR__.'/../view/requirementsNotMet.phtml');
    }
}
