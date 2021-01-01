<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class ArticleListItem extends Component
{
    public $post;

    /**
     * Create a new component instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.article-list-item');
    }
}
