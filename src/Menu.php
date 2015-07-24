<?php
namespace VoronoiImageMapPlugin;

class Menu
{
    public function __construct()
    {
        add_action('admin_menu', array($this,'addMenus'));
    }

    public function addMenus()
    {
        add_menu_page( 'Voronoi', 'Voronoi', 'manage_options', 'voronoi', array($this, 'mainPage'));
    }

    public function mainPage()
    {
        include(__DIR__.'/../view/mainPage.phtml');
    }
}