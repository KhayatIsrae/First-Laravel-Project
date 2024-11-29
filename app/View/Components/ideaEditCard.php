<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ideaEditCard extends Component
{
    public $idea;
    /**
     * Create a new component instance.
     */
    public function __construct($idea)
    {
        $this->idea=$idea;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.idea-edit-card');
    }
}
