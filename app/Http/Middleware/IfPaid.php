<?php

namespace App\Http\Middleware;
use Closure;
use App\User;

class IfPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isPaid = true;

        if (\Auth::check()) {
            $user = $request->user();
            $payment = $user->payment()->count();
            $isPaid =  ($payment) ?? false;
        }

        if($isPaid == false){
            return redirect('/payment');
        }

        return $next($request);
    }
}
