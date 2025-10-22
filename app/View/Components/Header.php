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
        $this->menuItems = GLOBALS::MENU_ITEMS;
    }

    public function render(): View
    {
        return view('components.header');
    }
}
