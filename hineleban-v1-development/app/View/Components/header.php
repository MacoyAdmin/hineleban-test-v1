<?php

namespace App\View\Components;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $home;
    public $contact;
    public $store;
    public $tac;
    public $faq;
    public function __construct($data)
    {
        //
        if($data=='home'){
            $this->home='active';
        }elseif($data=='contact'){
            $this->contact='active';
        }
        elseif($data=='store'){
            $this->store='active';
        }
        elseif($data=='tac'){
            $this->tac='active';
        }
        elseif($data=='faq'){
            $this->faq='active';
        }
            
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
