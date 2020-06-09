<?php

namespace App\Admin\Controllers;

use App\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Questions';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        $grid->column('question', __('Question'));
       // $grid->column('question_image', __('Question image'));
        $grid->column('score', __('Score'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));
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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('question', __('Question'));
        $show->field('question_image', __('Question image'))
        ->image('', 100, 100);
        $show->field('score', __('Score'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        $show->options('Questions Options', function ($option) {
            $option->disableFilter();
            $option->disableExport();
            $option->disableRowSelector();
            $option->disableCreateButton();
            $option->disableColumnSelector();
            
            $option->id();
            $option->option_text();
            $option->correct()->using(['1' => Question::YES, '0' => Question::NO]);
            $option->created_at();
            $option->disableActions();
            //$option->updated_at();
        });


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question());

        $form->textarea('question', __('Question'))->rules('required|min:3');
        $form->image('question_image', __('Question image'))->move('questions')
              ->uniqueName()->removable();
        $form->number('score', __('Score'));
        
        $states = [
            'on'  => ['value' => 1, 'text' => Question::YES],
            'off' => ['value' => 0, 'text' => Question::NO]
        ];     

        $form->hasMany('options',__("Question Options"), function (Form\NestedForm $form) 
             use ($states){
            $form->textarea('option_text',__('Option Text'));
            $form->switch('correct')->default(Question::NO);
        })->useTable();


        return $form;
    }
}
