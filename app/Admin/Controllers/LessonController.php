<?php

namespace App\Admin\Controllers;

use App\Lesson;
use App\Course;
use Encore\Admin\Show\Field;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LessonController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lessons';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lesson());

        $grid->column('id', __('Id'));
        // $grid->column('course_id', __('Course id'));
        $grid->column('title', __('Title'));
        //$grid->column('slug', __('Slug'));
        // $grid->column('lesson_image', __('Lesson image'));

        $grid->column('short_text', __('Short text'))->display(function ($body) {
            return \Str::limit(strip_tags($body),40);
        });

        // $grid->column('full_text', __('Full text'));
        // $grid->column('position', __('Position'));
        $grid->column('free_lesson', __('Free lesson'))->using(['1' => Course::YES, '0' => Course::NO]);
        $grid->column('published', __('Published'))->using(['1' => Course::YES, '0' => Course::NO]);
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
        $show = new Show(Lesson::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('course_id', __('Course id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('lesson_image', __('Lesson image'))
        ->image('', 100, 100);
        $show->field('short_text', __('Short text'));
        $show->field('full_text', __('Full text'));
       // $show->field('position', __('Position'));
        $show->field('free_lesson', __('Free lesson'));
        $show->field('published', __('Published'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Lesson());

        $courses = Course::pluck('title','id');

        $form->select('course_id', __('Course'))->options($courses);
        $form->text('title', __('Title'))->rules('required|min:3');
        $form->hidden('slug');
        $form->image('lesson_image', __('Lesson image'))->move('lessons')
              ->uniqueName()->removable();
        $form->textarea('short_text', __('Short text'));
        $form->ckeditor('full_text', __('Full text'));
        //$form->number('position', __('Position'));

        $form->multipleFile('downloadable_files', __('Downloadable Files'))->move('lessons')
              ->uniqueName()->removable()->rules('mimes:doc,docx,xlsx,pdf');

        $states = [
            'on'  => ['value' => 1, 'text' => Course::YES],
            'off' => ['value' => 0, 'text' => Course::NO]
        ];        

        $form->switch('free_lesson', __('Free Lesson'))->states($states)->default(Course::YES);
        $form->switch('published', __('Published'))->states($states)->default(Course::YES);

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
