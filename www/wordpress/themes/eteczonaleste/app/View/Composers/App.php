<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'logo' => $this->getLogo(),
            'header' => $this->getHeader(),
            'copyright' => $this->getCopyright(),
            'developed' => $this->getDeveloped(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    private function siteName()
    {
        return get_bloginfo('name', 'display');
    }


    /**
     * Retrieves the logo from the WordPress options.
     *
     * @return string The URL of the logo.
     */
    private function getLogo()
    {
        return get_field('logo', 'option');
    }

    /**
     * Retrieves the header field value from the WordPress options table.
     *
     * @return mixed The value of the 'header' field from the 'option' row.
     */
    private function getHeader()
    {
        return get_field('header', 'option');
    }

    /**
     * Retrieves the copyright text from the WordPress options.
     *
     * @return string The copyright text.
     */
    private function getCopyright()
    {
        return get_field('footer_copyright', 'option');
    }

    /**
     * Retrieves the value of the 'footer_developed' field from the 'option' group.
     *
     * @return mixed The value of the 'footer_developed' field.
     */
    private function getDeveloped()
    {
        return get_field('footer_developed', 'option');
    }
}
