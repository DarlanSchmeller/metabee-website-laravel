<?php

namespace App\View\Components;

use App\Constants\Globals;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialButtons extends Component
{
    public $facebookLink;

    public $linkedinLink;

    public $instagramLink;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->facebookLink = Globals::FACEBOOK_LINK;
        $this->linkedinLink = Globals::LINKEDIN_LINK;
        $this->instagramLink = Globals::INSTAGRAM_LINK;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social-buttons');
    }
}
