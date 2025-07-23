<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ScrollingHeadings extends Component
{
    public $headings;
    public $speed;
    public $direction;
    public $uniqueId;

    /**
     * Create a new component instance.
     */
    public function __construct($headings, $speed = '20s', $direction = 'right')
    {
        $this->headings = $headings;
        $this->speed = is_numeric($speed) ? $speed.'s' : $speed; // Handle both "20" and "20s"
        $this->direction = $direction;
        $this->uniqueId = 'marquee-'.uniqid(); // Unique ID for each instance
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scrolling-headings');
    }
}