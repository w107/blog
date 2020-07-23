<?php

namespace Inn20\Blog\Admin\Controllers;

use Encore\Admin\Layout\Content;
use Inn20\Blog\Models\Setting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Inn20\Blog\Services\SettingService;

class SettingController extends AdminController
{
    protected function title()
    {
        return  __blog('setting');
    }

    protected function grid()
    {
        $grid = new Grid(new Setting());
        $grid->column('id', __blog('id'));
        $grid->column('key', __blog('setting_key'));
        $grid->column('value', __blog('setting_value'));
        //$grid->column('type', __blog('type'));
        $grid->column('comment', __blog('setting_comment'));
        $grid->column('created_at', __blog('created_at'));
        $grid->column('updated_at', __blog('updated_at'));

        $grid->disableCreateButton();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });

        return $grid;
    }

    public function edit($id, Content $content)
    {
        $setting = Setting::findOrFail($id);
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form($setting)->edit($id));
    }

    protected function form($model = null)
    {
        $form = new Form(new Setting());

        $form->display('key', __blog('setting_key'));
        $form->display('comment', __blog('setting_comment'));
        if ($model) {
            call_user_func_array([$form, $model->type], ['value', __blog('setting_value')]);
        } else {
            $form->hidden('value');
        }
        $form->saved(function (Form $form) {
            SettingService::forgetCache();
        });

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableCreatingCheck();
        });

        return $form;
    }
}
