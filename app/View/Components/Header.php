<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Constants\Globals;

class Header extends Component
{
    public $menuItems;

    public function __construct()
    {
        $this->menuItems = GLOBALS::MENU_ITEMS;
    }

    public function render(): View
    {
        return view('components.header');
    }
}
