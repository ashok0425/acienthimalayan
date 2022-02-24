<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pageHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $route;
    public $before;
    public $beforeroute;



    public function __construct($title,$route,$before=null,$beforeroute=null)
    {
        $this->title=$title;
        $this->route=$route;
        $this->before=$before;
        $this->beforeroute=$beforeroute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
