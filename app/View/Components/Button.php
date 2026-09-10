<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
  public string $btnClass;
  public string $type;

    public function __construct(
        public ?string $color = null,
        public ?string $size = null,
        public ?string $justify = null,
        public ?string $align = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $transform = null,
        public bool $fullWidth = false,
        string $type = 'button'
    ) {
       
        $selectedColor     = $this->color ?? config('button-bootstrap.defaults.color', 'dark');
        $selectedSize      = $this->size ?? config('button-bootstrap.defaults.size', 'sm');
        $selectedJustify   = $this->justify ?? config('button-bootstrap.defaults.justify', 'center');
        $selectedAlign     = $this->align ?? config('button-bootstrap.defaults.align', 'center');
        $selectedRounded   = $this->rounded ?? config('button-bootstrap.defaults.rounded', 'md');
        $selectedShadow    = $this->shadow ?? config('button-bootstrap.defaults.shadow', 'sm');
        $selectedTransform = $this->transform ?? config('button-bootstrap.defaults.transform', 'uppercase');

       
        $colorClass     = config("button-bootstrap.colors.{$selectedColor}", 'btn-dark');
        $sizeClass      = config("button-bootstrap.sizes.{$selectedSize}", 'btn-sm');
        $justifyClass   = config("button-bootstrap.justify.{$selectedJustify}", 'justify-content-center');
        $alignClass     = config("button-bootstrap.align.{$selectedAlign}", 'align-items-center');
        $roundedClass   = config("button-bootstrap.rounded.{$selectedRounded}", 'rounded');
        $shadowClass    = config("button-bootstrap.shadow.{$selectedShadow}", 'shadow-sm');
        $transformClass = config("button-bootstrap.transform.{$selectedTransform}", 'text-uppercase');
        $blockClass     = $this->fullWidth ? 'btn-block w-100' : '';
        $this->type = $type;
       
        $this->btnClass = implode(' ', array_filter([
            'btn',
            'd-inline-flex',
            'font-weight-bold',
            $colorClass,
            $sizeClass,
            $justifyClass,
            $alignClass,
            $roundedClass,
            $shadowClass,
            $transformClass,
            $blockClass,
        ]));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
