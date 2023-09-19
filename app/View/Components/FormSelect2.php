<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $name = null,
        public $label = null,
        public $options = null,
        public $records = null
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-select2');
    }
}
