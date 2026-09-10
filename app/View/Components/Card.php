<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public $title,$link,$count,$icon;
    public function __construct($title='', $link='', $count=0, $icon='')
    {
        $this->title = $title;
        $this->link = $link;
        $this->count = $count;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
