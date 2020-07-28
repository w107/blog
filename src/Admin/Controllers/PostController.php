<?php

namespace Inn20\Blog\Admin\Controllers;

use Inn20\Blog\Models\Tag;
use Parsedown;
use Inn20\Blog\Models\Category;
use Inn20\Blog\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @return string
     */
    protected function title()
    {
        return  __blog('post');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());
        $grid->model()->reverseOrder()->recent();

        $grid->column('id', __blog('id'));
        $grid->column('category.title', __blog('category'));
        $grid->column('title', __blog('title'));
        $grid->column('post_link', __blog('link'))->display(function () {
            return $this->link();
        })->link();
        $grid->column('order', __blog('order'))->editable();
        $grid->column('type', __blog('type'))->using(Post::$type_map);
        $grid->column('published', __blog('published'))
            ->using([0 => '未发布', 1 => '已发布'])
            ->label([0 => 'default', 1 => 'success']);
        $grid->column('tags', __blog('tag'))->pluck('title')->label();
        $grid->column('view_count', __blog('view_count'));
        $grid->column('comment_count', __blog('comment_count'));
        $grid->column('created_at', __blog('created_at'));
        $grid->column('updated_at', __blog('updated_at'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __blog('id'));
        $show->field('category.title', __blog('category'));
        $show->field('title', __blog('title'));
        $show->field('content', __blog('content'))->unescape()->as(function ($content) {
            $parsedown = new Parsedown();
            return $parsedown->text($content);
        });
        $show->field('type', __blog('type'))->using(Post::$type_map);
        $show->field('view_count', __blog('view_count'));
        $show->field('comment_count', __blog('comment_count'));
        $show->field('created_at', __blog('created_at'));
        $show->field('updated_at', __blog('updated_at'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $form->select('category_id', __blog('category'))->options(Category::all()->pluck('title', 'id'))->required();
        $form->multipleSelect('tags', __blog('tag'))->options(Tag::all()->pluck('title', 'id'));
        $form->text('title', __blog('title'))->required();
        $form->simplemde('content', __blog('content'))->required();
        $form->number('order', __blog('order'))->default(0);
        $form->select('type', __blog('type'))->options(Post::$type_map)->required();
        $form->switch('published', __blog('published'));

        return $form;
    }
}
