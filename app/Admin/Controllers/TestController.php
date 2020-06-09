<?php

namespace App\Admin\Controllers;

use App\Test;
use App\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tests';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Test());

        $grid->column('id', __('Id'));
        // $grid->column('course_id', __('Course id'));
        // $grid->column('lesson_id', __('Lesson id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->questions()->display(function ($questions) {
            $questions = array_map(function ($question) {
                return "<span class='label label-success'>{$question['question']}</span>";
            }, $questions);
            return join('&nbsp;', $questions);
        });

        $grid->column('published', __('Published'))->using(['1' => Question::YES, '0' => Question::NO]);
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
        $show = new Show(Test::findOrFail($id));

        $show->field('id', __('Id'));
       // $show->field('course_id', __('Course id'));
        //$show->field('lesson_id', __('Lesson id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('published', __('Published'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->questions()->as(function ($questions) {
            $questions = $questions->map(function($question){
              return $question->question;
            })->join(',');
            return $questions;
        });

        // $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Test());

        // $form->number('course_id', __('Course id'));
        // $form->number('lesson_id', __('Lesson id'));
        $form->text('title', __('Title'))->rules('required|min:3');
        $form->textarea('description', __('Description'));

        $questions = Question::pluck('question','id');
       
        $form->multipleSelect('questions')->options($questions);

        $form->switch('published', __('Published'));


        return $form;
    }
}
