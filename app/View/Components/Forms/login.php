<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class login extends Component
{
    public array $userTypes;
    /**
     * Create a new component instance.
     */
    public function __construct($userTypes)
    {
        $this->userTypes = $userTypes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.login');
    }
}
