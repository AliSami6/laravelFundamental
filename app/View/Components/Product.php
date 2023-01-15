<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    public $class,$type;
    public function __construct($class,$type)
    {
        $this->class = $class;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product',['type'=>$this->type]);
    }
}
