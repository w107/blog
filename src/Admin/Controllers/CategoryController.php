<?php

namespace Inn20\Blog\Admin\Controllers;

use Inn20\Blog\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @return string
     */
    protected function title()
    {
        return  __blog('category');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());
        $grid->column('id', __blog('id'));
        $grid->column('title', __blog('title'));
        $grid->column('category_link', __blog('link'))->display(function () {
            return $this->link();
        })->link();
        $grid->column('description', __blog('description'));
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __blog('id'));
        $show->field('title', __blog('title'));
        $show->field('description', __blog('description'));
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
        $form = new Form(new Category());

        $form->text('title', __blog('title'))->required();
        $form->textarea('description', __blog('description'))->required();

        return $form;
    }
}
