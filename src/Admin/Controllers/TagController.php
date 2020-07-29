<?php

namespace Inn20\Blog\Admin\Controllers;

use Inn20\Blog\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @return string
     */
    protected function title()
    {
        return  __blog('tag');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tag());
        $grid->column('id', __blog('id'));
        $grid->column('title', __blog('title'));
        $grid->column('tag_link', __blog('link'))->display(function () {
            return urldecode($this->link());
        })->link();
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
        $show = new Show(Tag::findOrFail($id));

        $show->field('id', __blog('id'));
        $show->field('title', __blog('title'));
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
        $form = new Form(new Tag());

        $form->text('title', __blog('title'))->required();

        return $form;
    }
}
