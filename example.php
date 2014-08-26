<?php
/**
 * Plugin Name: example
 * Plugin URI: http://its.truman.edu
 * Description: Provides an example plugin to build off of.
 * Version: 1.0.0
 * Author: Curtis Kelsey
 * Author URI: http://its.truman.edu
 * License: Proprietary
 */

// Initialize the autoloader
require_once "vendor/autoload.php";

// Instantiate any objects that you need
$example = new \ExamplePlugin\Example();