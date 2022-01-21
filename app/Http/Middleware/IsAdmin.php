<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    class IsAdmin
{
    /**
     * @var Guard
     */
    private $auth;

    public function __construct (Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->auth->check() && $this->auth->user()->user_type_id == 1) {
            return $next($request);
        }

        return redirect('/home')->with('error',trans('sentences.access_denied'));
    }
}
}
