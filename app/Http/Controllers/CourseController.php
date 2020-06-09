<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;


class CourseController extends Controller
{
    public function index(Request $request)
	{
		$courses = Course::where('published',Course::PUBLISHED)->paginate(Course::PER_PAGE);

	    return view('courses',compact('courses'));
	}

	public function show(Request $request,$slug = null )
	{
		$courses = Course::where(
			    [['published', Course::PUBLISHED], ['slug','<>', $slug]]
			 )->paginate(Course::SINGLE_PER_PAGE);

		$course = Course::where(
		  ['published' => Course::PUBLISHED, 'slug' => $slug]
		)->with('teachers','lessons')->first();
     
	    return view('course',compact('course','courses'));
	}
}
