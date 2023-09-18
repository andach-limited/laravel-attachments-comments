<?php

namespace Andach\LaravelAttachmentsComments\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Comment extends Component
{
    public string $class = 'text-sm bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 p-3 rounded-lg rounded-tl-none border border-slate-200 dark:border-slate-700 shadow-md mb-1';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $time, public string $picture, public string $userID = '')
    {
        if ($userID === Auth::id()) {
            $this->class = 'text-sm bg-indigo-500 text-white p-3 rounded-lg rounded-tl-none border border-transparent shadow-md mb-1';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chat');
    }
}
