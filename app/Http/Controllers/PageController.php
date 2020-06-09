<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Page;


class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,$slug = null)
    {
    
    $page = Page::where('slug', $slug)->where('status', Page::STATUS_ACTIVE)->first();

    if($page){
        return view('page',compact('page'));
    }elseif (view()->exists('static'.'/'.$slug)) {
      return view('static'.'/'.$slug); 
    }
    else{

       abort(404,'somthing went wrong');
    }

  }

  public function feedback(Request $request) 
  {

    $this->validate($request, [ 'email' => 'required|email', 'feedback_message' => 'required' ]);

    Mail::send('pages.email', array('email' => $request->email,'feedback__message' => $request->feedback__message),function ($message) {
        $message->from('driverfinder44@gmail.com');
        $message->to('driverfinder44@gmail.com')->subject('Driver Hire Feedback from Client');
    });

    return redirect()->back()->with('success', 'Thanks for your valuable feedback!'); 

  }

  public function contactUs(Request $request)
  {
    $validator  = Validator::make($request->all(), [
      'name'    => 'required',
      'email'   => 'required|email',
      'phone'   => 'required|regex:/^[0-9]{7,15}$/',
      'message' => 'required|min:10'
    ]);


    if($validator->fails()) {
      return redirect('contact')->withErrors($validator)->withInput();
    }


    try {

        Mail::to(config('mail.from.address'))->send(new ContactMail($request));
         return redirect(route('contact'))->with('message', 'Successfully send!! We will contact you soon');

    } catch (\Exception $e) {
        return redirect('contact')->withErrors($e);
    }
  }


}
