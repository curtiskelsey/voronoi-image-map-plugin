<?php

namespace VoronoiImageMapPlugin;

/**
 * Class Menu
 * @package VoronoiImageMapPlugin
 */
class Menu
{
    /** @var \Logger */
    private $logger;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        $this->logger = \Logger::getLogger(__CLASS__);

        add_action('admin_menu', array($this, 'addMenus'), 9);
    }

    /**
     * Adds a menu item to the wp-admin dashboard
     */
    public function addMenus()
    {
        $this->logger->debug('Adding menus...');

        add_menu_page(
            'Voronoi',
            'Voronoi',
            'manage_options',
            'voronoi',
            array($this, 'mainPage')
        );
    }

    /**
     *
     */
    public function mainPage()
    {
        $this->logger->debug('Displaying the main page...');

        include(__DIR__ . '/../view/mainPage.phtml');
    }
}