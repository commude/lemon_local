<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class SideLink extends Component
{
    public $route;
    public $linkImage;

    /**
     * Create a new component instance.
     *
     * @param string $route
     * @param string $linkImage
     * @return void
     */
    public function __construct($route, $linkImage)
    {
        $this->route = $route;
        $this->linkImage = $linkImage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.side-link');
    }
}
