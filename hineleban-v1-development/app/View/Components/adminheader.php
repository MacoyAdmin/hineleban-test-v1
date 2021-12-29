<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminheader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $adduser;
    public function __construct($data)
    {
        //
        if($data=='adduser'){
            $this->adduser='active';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adminheader');
    }
}
