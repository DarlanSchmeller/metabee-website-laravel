<?php

namespace App\View\Components;

use App\Constants\Globals;
use Illuminate\View\Component;

class Pricing extends Component
{
    public $plans;

    public function __construct()
    {
        $this->plans = Globals::PRICING;
    }

    public function render()
    {
        return view('components.pricing');
    }
}
