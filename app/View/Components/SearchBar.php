<?php

namespace App\View\Components;

use App\Constants\Globals;
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
        $this->categories = Globals::COURSE_CATEGORIES;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-bar');
    }
}
