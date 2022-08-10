<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\users;

class isExist
{
    public function handle(Request $request, Closure $next)
    {
        if(users::where('mobile', $request->tel)->count()){
            return redirect('/create')->withErrors(['msg' => 'This phone number alredy exist!.']);
        }else{
            return $next($request);
        }
    }
}
