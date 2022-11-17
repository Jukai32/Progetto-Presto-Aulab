<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->profile()->exists()) {

            return $next($request);
        }
        return redirect(route('profile.edit'))->with('access.denied', 'Hai già un profilo');
    }
}
