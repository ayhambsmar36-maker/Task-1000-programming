<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public string $textareaClass;

    public string $type,$placeholder,$value;
    public function __construct(
        public ?string $size = null,
        public ?string $resize = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $state = null,
        public ?string $border = null,
        public int $rows = 4,
         ?string $placeholder = null,
         ?string $value = null,
         ?string $type = null,
    ) {
        $selectedSize    = $this->size ?? config('textArea.defaults.size', 'md');
        $selectedResize  = $this->resize ?? config('textArea.defaults.resize', 'vertical');
        $selectedRounded = $this->rounded ?? config('textArea.defaults.rounded', 'md');
        $selectedShadow  = $this->shadow ?? config('textArea.defaults.shadow', 'none');
        $selectedState   = $this->state ?? config('textArea.defaults.state', 'default');
        $selectedBorder  = $this->border ?? config('textArea.defaults.border', 'default');

        $sizeClass    = config("textArea.sizes.{$selectedSize}", '');
        $resizeClass  = config("textArea.resize.{$selectedResize}", 'style-resize-y');
        $roundedClass = config("textArea.rounded.{$selectedRounded}", 'rounded');
        $shadowClass  = config("textArea.shadow.{$selectedShadow}", 'shadow-none');
        $stateClass   = config("textArea.states.{$selectedState}", '');
        $borderClass  = config("textArea.borders.{$selectedBorder}", '');
        $this->rows = 1;
        $this->placeholder = $placeholder ?? '';
        $this->value = $value ?? '';
        $this->type = $type ?? 'text';
       

        $this->textareaClass = implode(' ', array_filter([
            'form-control',
            $sizeClass,
            $resizeClass,
            $roundedClass,
            $shadowClass,
            $stateClass,
            $borderClass,
            $this->rows,
        ]));
    }

    public function render()
    {
        return view('components.text-area');
    }
}
