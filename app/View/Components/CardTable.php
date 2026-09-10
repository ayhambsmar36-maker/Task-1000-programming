<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $title,
           $columns
          ;
    public function __construct($title='', $columns=[])
    {
        $this->title = $title;
        $this->columns = $columns;
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-table');
    }
}
