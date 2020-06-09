<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\DashboardController;

class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Members';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());
        $grid->disableCreateButton();

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        // $grid->column('email_verified_at', __('Email verified at'));
        //$grid->column('password', __('Password'));
        $grid->column('number', __('Number'));
        //$grid->column('role', __('Role'));
        //$grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $member = User::findOrFail($id);
        $show = new Show($member);
        $userInfo = $member->userInfo()->first();

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        // $show->field('email_verified_at', __('Email verified at'));
       // $show->field('password', __('Password'));
        $show->field('number', __('Number'));
        // $show->field('role', __('Role'));
        // $show->field('remember_token', __('Remember token'));
       
        $show->sponser_id()->as(function ($s) use ($userInfo){
            return $userInfo['sponser_id'];
        }); 

        $show->refer_sponser_id()->as(function ($s) use ($userInfo) {
            return $userInfo['refer_sponser_id'];
        }); 

        $show->direct_members()->as(function ($s) use ($userInfo) {
            return (new DashboardController)->getMembers($userInfo['sponser_id'],'direct');
        }); 

        $show->all_members()->as(function ($s) use ($userInfo) {
            return (new DashboardController)->getMembers($userInfo['sponser_id'],'all');
        });

        $show->wallet()->as(function ($wallet) {
            return $wallet->sum('amount');
        });

        $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));
        

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
        $form->email('email', __('Email'));
       // $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('number', __('Number'));
       // $form->text('role', __('Role'));
       // $form->text('remember_token', __('Remember token'));

        return $form;
    }

    public function create(Content $content){
        return redirect()->back();
    }
}
