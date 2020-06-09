<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserInfo;

class Wallet extends Model
{
    CONST FIRST_LEVEL = 50;

    CONST SECOND_LEVEL = 25;

    CONST THIRD_LEVEL = 20;

    CONST FOURTH_LEVEL = 15;

    CONST FIFTH_LEVEL = 10;

    CONST SIXTH_LEVEL = 5;

    CONST LEVELCOUNT = 6;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id','user_id',
        'amount'
    ];

    
    public static function level($level,$refer_sponser_id,$data = [])
    {
           $user = User::whereHas('UserInfo', function($q) use ($refer_sponser_id){
                        $q->whereNotNull('sponser_id');
                        $q->where('sponser_id', $refer_sponser_id);
                    })->with('UserInfo')->first(); 

          $refer_sponser_id =  @$user['UserInfo']->refer_sponser_id;
   
          if ($level > self::LEVELCOUNT) {
            return $data;
          } else {

            if(!$user){
                return self::level( ++$level,$refer_sponser_id,$data);
            }
            
            switch ($level) {
                 
                case 1:
                    $amount = self::FIRST_LEVEL;
                    // $data[] = [
                    //        'user_id' => @$user->id,
                    //        'amount' => $amount
                    // ];
                    break;
               case 2: 
                    $amount = self::SECOND_LEVEL;
                   //  $data[] = [
                   //     'user_id' => @$user->id,
                   //     'amount' => $amount
                   // ];  
                   break;           
               case 3:
                    $amount = self::THIRD_LEVEL;
                    // $data[] = [
                    //    'user_id' => @$user->id,
                    //    'amount' => $amount
                    // ];
                    break;
               case 4:
                    $amount = self::FOURTH_LEVEL;
                    // $data[] = [
                    //    'user_id' => @$user->id,
                    //    'amount' => $amount
                    // ];
                    break;

              case  5:
                    $amount = self::FIFTH_LEVEL;
                    // $data[] = [
                    //    'user_id' => @$user->id,
                    //    'amount' => $amount
                    // ];
                    break;
               case  6:
                    $amount = self::SIXTH_LEVEL;
                    // $data[] = [
                    //    'user_id' => @$user->id,
                    //    'amount' => $amount
                    // ];
                    break;
               
              }

             $data[] = [
               'user_id' => @$user->id,
               'amount' => $amount
            ];  

            return self::level( ++$level,$refer_sponser_id,$data);
          }
    }

    public static function insert(){

         $user = auth()->user();
         $walletBy = $user->walletBy();
         
         if($walletBy->count()){
           return true;
         }

         $userInfo = $user->userInfo()->first();
         $refer_sponser_id = $userInfo->refer_sponser_id;
        
         if($refer_sponser_id == '' || $refer_sponser_id == User::TOP_SPONSER){
            return true;
         }

         $data = self::level(1,$refer_sponser_id);

         $walletBy->createMany($data);

         return true;
    }
}
