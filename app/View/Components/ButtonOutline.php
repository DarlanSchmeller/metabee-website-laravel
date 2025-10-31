<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonOutline extends Component
{
    public $colorClass;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->colorClass = [
            'red' => 'text-red-400 hover:text-red-300 border-red-500/30 hover:shadow-red-500/40',
            'amber' => 'text-amber-400 hover:text-amber-300 border-amber-500/30 hover:shadow-amber-500/40',
            'green' => 'text-green-400 hover:text-green-300 border-green-500/30 hover:shadow-green-500/40',
            'blue' => 'text-blue-400 hover:text-blue-300 border-blue-500/30 hover:shadow-blue-500/40',
            'gray' => 'text-gray-300 hover:text-gray-200 border-gray-500/30 hover:shadow-gray-500/40',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.button-outline');
    }
}
