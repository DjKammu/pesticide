<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StepRequest;
use App\User;
use App\UserInfo;
use App\Country;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user =  $request->user();
        $userInfo = $user->userInfo()->first();
        $wallet = (float) $user->wallet()->sum('amount');
        $sponser_id = $userInfo->sponser_id;
        
        $direct = $this->getMembers($sponser_id,'direct');

        $all = $this->getMembers($sponser_id,'all');

        return view('dashboard.index',compact('user','userInfo','wallet','direct','all'));
    }


    
    public function members(Request $request,$sponser_id,$type){
       
        
    }

    public function getMembers($sponser_id,$type,$count = 0,$refer_sponser_ids = []){
       
       $query = User::whereHas('UserInfo', function($q) use ($sponser_id){
                        $q->whereNotNull('refer_sponser_id');
                        $q->where('refer_sponser_id', $sponser_id);
                  })->with('UserInfo');
      
        if($type == User::IS_DIRECT_COUNT){
            return $query->count();
        } elseif ($type == User::IS_PAGI) {
          return $query->paginate(User::PER_PAGE);
        } elseif ($type == User::IS_ALL_COUNT) {
          
        $count = $count + $query->count();

        $refer_sponser_ids = array_merge($refer_sponser_ids,$query->get()
          ->pluck('UserInfo.sponser_id')->all());

        $refer_sponser_ids = array_diff($refer_sponser_ids,[$sponser_id]);

        $sponser_id = @$refer_sponser_ids[0];

        if(count($refer_sponser_ids) == 0){
          return $count;
        }

        return self::getMembers($sponser_id,$type,$count,$refer_sponser_ids);
    
        }

     
    } 
}
