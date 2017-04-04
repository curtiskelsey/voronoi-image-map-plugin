<?php

namespace VoronoiImageMapPlugin;

/**
 * Class Initialize
 * @package VoronoiImageMapPlugin
 */
class Initialize
{
    /** @var Menu  */
    protected $menu;

    /** @var CustomPostType  */
    protected $postType;

    /** @var \Logger  */
    private $logger;

    const ADVANCED_CUSTOM_FIELDS_FILE = 'advanced-custom-fields/acf.php';

    public function __construct()
    {
        $this->logger = \Logger::getLogger(__CLASS__);

        $this->logger->debug('Initializing the plugin...');

        register_activation_hook(__FILE__, array(__CLASS__, 'onActivate'));
        register_deactivation_hook(__FILE__, array(__CLASS__, 'onDeactivate'));
        register_uninstall_hook(__FILE__, array(__CLASS__, 'onUninstall'));

        add_action('admin_init', array($this, 'requirementsCheck'));

        $this->menu = new Menu();

        $this->postType = new CustomPostType();
    }

    /**
     * TODO
     */
    public function onActivate()
    {

    }

    /**
     * TODO
     */
    public function onDeactivate()
    {

    }

    /**
     * TODO
     */
    public function onUninstall()
    {

    }

    /**
     *
     */
    public function requirementsCheck()
    {
        $this->logger->debug('Checking the requirements...');

        $acfActive = is_plugin_active(self::ADVANCED_CUSTOM_FIELDS_FILE);

        if (!$acfActive) {

            // Check if the ACF plugin is installed
            if (file_exists(__DIR__.'/../../'.self::ADVANCED_CUSTOM_FIELDS_FILE)) {

                // Try activating it
                $result = activate_plugin(
                    self::ADVANCED_CUSTOM_FIELDS_FILE,
                    null,
                    null,
                    true
                );

                if ($result === null) {
                    return;
                }
            }

            add_action('admin_notices', array($this, 'requirementsError'));
            return;
        }
    }

    /**
     * Display a message informing the user all of the requirements for this
     * plugin have not been met
     */
    public function requirementsError()
    {
        include(__DIR__.'/../view/requirementsNotMet.phtml');
    }
}
