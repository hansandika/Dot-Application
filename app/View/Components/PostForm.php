<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostForm extends Component
{

    /** 
     * @var array<object>
     */
    public $categories;

    /** 
     * @var string
     */
    public $action;

    /** 
     * @var object
     */
    public $post;

    /**
     * Create a new component instance.
     * @param array<object> $categories
     * @param string $action
     * @param object $post
     * @return void
     */
    public function __construct($action, $categories, $post = null)
    {
        $this->action = $action;
        $this->categories = $categories;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('posts.partials.form-control');
    }
}
