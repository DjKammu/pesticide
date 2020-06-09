<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
   protected $table = "users_info";

   protected $fillable = [
     'first_name',
     'last_name',
     'sponser_id',
     'refer_sponser_id',
   ];

    public function user()
	{
	     return $this->belongsTo('App\User');
	}
}
