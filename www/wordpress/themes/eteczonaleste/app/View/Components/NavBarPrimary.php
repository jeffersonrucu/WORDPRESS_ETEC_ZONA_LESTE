<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavBarPrimary extends Component
{

    public $nav;
    public $classes;
    public $dataJS;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nav = false, $classes = '', $dataJS = '')
    {
        $this->nav = $nav;
        $this->classes = $classes;
        $this->dataJS = $dataJS;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-bar-primary');
    }
}
