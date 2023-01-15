<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Brand extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // you can rename this blad word like as online , product .
        return <<<'online'
            <div class="bg-danger p-3">
              <!--  When there is no desire, all things are at peace. - Laozi-->
              {{$slot}}
            </div>
        online;
    }
}