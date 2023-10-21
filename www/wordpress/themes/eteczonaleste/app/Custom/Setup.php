<?php

namespace App\Custom;

include_once ABSPATH . 'wp-admin/includes/plugin.php';

class Setup
{
    public function __construct()
    {
        $this->checkACFProPluginActive();
        $this->checkSafeSVGPluginActive();
        $this->setFontFamily();
    }

    /**
     * Checks if the ACF Pro plugin is active and activates it if not.
     *
     * @return void
    */
    private function checkACFProPluginActive(): void
    {
        if(!is_plugin_active('advanced-custom-fields-pro/acf.php')) {
            $activate = activate_plugin('advanced-custom-fields-pro/acf.php');

            if (is_wp_error($activate)) {
                wp_die(__('Error locating the ACF PRO plugin. Consult the project documentation.', 'sage'));
            }
        }
    }

    /**
     * Checks if the Safe SVG plugin is enabled and enables it if not.
     *
     * @return void
    */
    private function checkSafeSVGPluginActive(): void
    {
        if(!is_plugin_active('safe-svg/safe-svg.php')) {
            $activate = activate_plugin('safe-svg/safe-svg.php');

            if (is_wp_error($activate)) {
                wp_die(__('Error locating the Sage SVG plugin. Consult the project documentation.', 'sage'));
            }
        }
    }

    /**
     * Set font Family to theme
     *
     * @return void
    */
    private function setFontFamily(): void
    {
        add_action('wp_enqueue_scripts', function() {
            wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');
        });
    }
}
