<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
    public string $title;
    public ?string $highlight;
    public ?bool $breakTitle;
    public ?string $subtitle;
    public string $bgColor;
    public string $textColor;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        ?string $highlight = null,
        ?bool $breakTitle = false,
        ?string $subtitle = null,
        string $bgColor = 'bg-gray-950',
        string $textColor = 'text-white'
    ) {
        $this->title = $title;
        $this->highlight = $highlight;
        $this->breakTitle = $breakTitle;
        $this->subtitle = $subtitle;
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
