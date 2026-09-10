<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class app extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $header;
    public function __construct($title = 'لوحة تحكم', $header = 'مدرسة الامل')
    {
        $this->title = $title;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.app');
    }
}
