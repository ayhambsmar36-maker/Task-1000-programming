<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FiltersCard extends Component
{
    public function __construct(
        public string $action = '',
        public string $resetRoute = '',
        public bool $hasFilters = false,
        public string $method = 'GET'
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.filters-card');
    }
}