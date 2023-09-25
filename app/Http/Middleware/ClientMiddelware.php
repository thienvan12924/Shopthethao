<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMiddelware
{
    public function handle(Request $request, Closure $next)
    {
        $check = Auth::guard('customer')->check();
        if($check) {
            $user = Auth::guard('customer')->user();
            if($user->is_active == 0) {
                toastr()->error('Tài khoản của bạn chưa được kích hoạt!');
                return redirect('/');
            }
            return $next($request);
        } else {
            // toastr()->error('Bạn phải đăng nhập để thực hiện chức năng này!');
            return redirect('/');
        }
    }
}
