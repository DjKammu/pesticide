<?php

namespace App\Admin\Controllers;

use App\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pages';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page);
        
        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Title'))->sortable();
        $grid->column('status', __('Status'));

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
        $show = new Show(Page::findOrFail($id));
        
        $show->field('id', __('ID'));
        $show->field('title', __('Title'));

        $show->body()->as(function ($body) {
            return \Str::limit(strip_tags($body),100);
        });

        $show->field('meta_description', __('Meta description'));
        $show->field('meta_keywords', __('Meta keywords'));

        $show->field('status', __('Is active'));

    
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Page);

        $form->text('title', __('Title'));
        $form->textarea('excerpt');
        $form->ckeditor('body');
        $form->textarea('meta_description', __('Meta description'));
        $form->textarea('meta_keywords', __('Meta keywords'));

        $states = [
            'on' => ['value' => Page::STATUS_ACTIVE,'text' => 'Active'],
            'off' => ['value' => Page::STATUS_INACTIVE, 'text' => 'Inactive'],
        ];

        $form->switch('status', __('Is active'))->states($states)->default(Page::STATUS_INACTIVE);

        $form->hidden('slug');

        $form->saving(function (Form $form){

            if(\request()->isMethod('POST')) {
                if ($form->slug == null) {
                    $slug = preg_replace('/(\d){1,}\.?(\d?){1,}\.?(\d?){1,}\.?(\d?){1,}/', '', $form->title);
                    $form->slug = \Str::slug($slug);
                }
            }

        });



        return $form;
    }
}
