<?php

namespace App\Admin\Controllers;

use App\User;
use App\Role;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StudentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Students ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->model()->whereHas('role',  function ($query) {
            $query->where('title', User::ROLE_STUDENT);
        });

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
       // $grid->column('email_verified_at', __('Email verified at'));
       // $grid->column('password', __('Password'));
        $grid->column('number', __('Number'));
       // $grid->column('role', __('Role'));
        //$grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('number', __('Number'));
        $show->field('role', __('Role'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
       // $form->email('email', __('Email'));
       // $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
       // $form->password('password', __('Password'));
      //  $form->mobile('number', __('Number'));

        $form->email('email', __('Email'))->rules(function ($form) {
            if (!$id = $form->model()->id) {
                return 'unique:users,email';
            }
        });
        $form->password('password', __('Password'))->rules(function ($form) {
            if (!$id = $form->model()->id) {
                return 'required';
            }
        });
         $form->mobile('number', __('number'))->rules(function ($form) {
            if (!$id = $form->model()->id) {
                return 'nullable|sometimes|unique:users,number';
            }
        });

        //$form->text('remember_token', __('Remember token'));
        
        $form->saved(function (Form $form){
           $role  =  Role::whereTitle(User::ROLE_STUDENT)->first() ?
                   : Role::create(['title' => User::ROLE_STUDENT]);
           $roleID = $role->id;  
           $form->model()->role()->sync([$roleID]);
        });         

        return $form;
    }
}
