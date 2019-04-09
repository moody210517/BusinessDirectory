<?php
/**
 * Created by PhpStorm.
 * User: ashwin
 * Description: Used for checking user is login or not
 * Date: 22/12/17
 * Time: 2:58 PM
 */

namespace App\Http\Middleware;
use Closure;


class LoginAuthentication
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
        $user_id = $request->session()->get('user_id');

        if(!isset($user_id)) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}