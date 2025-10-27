<?php

namespace App\View\Components;

use App\Constants\Globals;
use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public $menuItems;

    public function __construct()
    {
        $this->menuItems = GLOBALS::MAIN_PAGES;
    }

    public function render(): View
    {
        return view('components.header');
    }
}
