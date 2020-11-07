<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Services\CategoryService;

class Menu extends Component
{
    public $categories = []; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categories = $categoryService->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // return view('components.menu');//đối với component thì nó sẽ k cần truyền biến vào method view vì view ở bên component sẽ nhận
                                        //tất cả các biến public ở trong này
        return view('components.menu');
    }
}
