<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HasAccess extends Component
{
    /**
     * Create a new component instance.
     */
    public string $permission;
    public function __construct(string $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.has-access');
    }


}
