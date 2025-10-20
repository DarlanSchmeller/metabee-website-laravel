<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = [
            ['icon' => 'cpu-chip', 'label' => 'IA & ML'],
            ['icon' => 'wrench', 'label' => 'Hardware'],
            ['icon' => 'code-bracket', 'label' => 'Programação'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-bar');
    }
}
