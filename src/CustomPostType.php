<?php
namespace VoronoiImageMapPlugin;

class CustomPostType
{
    public function __construct()
    {
        add_action('init', array($this, 'addPostTypes'));
    }

    public function addPostTypes()
    {
        register_post_type( 'voronoi-image-map',
            array(
                'labels' => array(
                    'name' => __('Image Map'),
                    'singular_name' => __('Image Map')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'voronoi-image-maps'),
                'show_ui' => true,
                'show_in_menu' => 'voronoi',
                'supports' => array(
                    'title',
                    'thumbnail',
                )
            )
        );
    }
}