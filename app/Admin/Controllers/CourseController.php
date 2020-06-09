<?php

namespace App\Admin\Controllers;

use App\User;
use App\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CourseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Courses';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->teachers()->display(function ($teachers) {
            $teachers = array_map(function ($teacher) {
                return "<span class='label label-success'>{$teacher['name']}</span>";
            }, $teachers);
            return join('&nbsp;', $teachers);
        });

        $grid->description()->display(function ($body) {
            return \Str::limit(strip_tags($body),40);
        });
        //$grid->column('price', __('Price'));
        $grid->column('start_date', __('Start date'));
        $grid->column('free', __('Free'))->using(['1' => Course::YES, '0' => Course::NO]);
        $grid->column('published', __('Published'))->using(['1' => Course::YES, '0' => Course::NO]);
        $grid->column('created_at', __('Created at'));
       // $grid->column('updated_at', __('Updated at'));
       // $grid->column('deleted_at', __('Deleted at'));

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
        $course = Course::findOrFail($id);

        $show = new Show($course);

        $show->field('id', __('Id'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('start_date', __('Start date'));
        $show->field('free', __('Free'));
        $show->field('published', __('Published'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->image()->image('', 100, 100);

        // $show->image()->as(function($img) use ($course) {
        //      return ($url = $course->getMedia('courses')->first()) ? $url->getUrl() : '';
        // } )->image('', 100, 100);


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Course());

        $teachers = User::whereHas('role',  function ($query) {
            $query->where('title', User::ROLE_TEACHER);
        })->pluck('name','id');
       
        $form->multipleSelect('teachers')->options($teachers);

        $form->text('title', __('Title'))->rules('required|min:3');
        $form->ckeditor('description', __('Description'))->rules('required');;
        $form->image('image', __('Image'))->move('courses')->uniqueName()->removable();

        // $form->decimal('price', __('Price'));
        $form->date('start_date', __('Start date'))->default(date('Y-m-d'));
        $states = [
            'on'  => ['value' => 1, 'text' => Course::YES],
            'off' => ['value' => 0, 'text' => Course::NO]
        ];        

        $form->switch('free', __('Free'))->states($states)->default(Course::YES);
        $form->switch('published', __('Published'))->states($states)->default(Course::YES);

        $form->hidden('slug');

        $form->submitted(function (Form $form) {
             $form->ignore('teacher');
         });

        $form->saving(function (Form $form){

            if(\request()->isMethod('POST')) {
                if ($form->slug == null) {
                    $slug = preg_replace('/(\d){1,}\.?(\d?){1,}\.?(\d?){1,}\.?(\d?){1,}/', '', $form->title);
                    $form->slug = \Str::slug($slug);
                }
            }

        });
        
           //Store Image
        // if(request()->hasFile('image') && request()->file('image')->isValid()){
        //     $form->model()->addMediaFromRequest('image')->toMediaCollection('courses');
        //  }


        return $form;
    }
}
