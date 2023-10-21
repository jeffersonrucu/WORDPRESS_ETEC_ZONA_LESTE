<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $style;
    public $size;
    public $button;
    public $classes;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'link', $style = 'primary', $size = 'md', $button, $classes='')
    {
        $this->type = $type;
        $this->style = $style;
        $this->size = $size;
        $this->button = $button;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
