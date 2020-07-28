<?php

namespace Inn20\Blog\Admin\Controllers;

use Inn20\Blog\Models\Navigation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NavigationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @return string
     */
    protected function title()
    {
        return  __blog('navigation');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Navigation());
        $grid->model()->reverseOrder();

        $grid->column('id', __blog('id'));
        $grid->column('title', __blog('title'));
        $grid->column('url', __blog('url'));
        $grid->column('description', __blog('description'));
        $grid->column('out_link', __blog('out_link'));
        $grid->column('order', __blog('order'))->editable();
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
        $show = new Show(Navigation::findOrFail($id));

        $show->field('id', __blog('id'));
        $show->field('title', __blog('title'));
        $show->field('url', __blog('url'));
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
        $form = new Form(new Navigation());

        $form->text('title', __blog('title'))->required();
        $form->text('url', __blog('url'));
        $form->textarea('description', __blog('description'));
        $form->switch('out_link', __blog('out_link'));
        $form->number('order', __blog('order'))->default(0);

        return $form;
    }
}
