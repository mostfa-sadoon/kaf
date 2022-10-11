<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class TeacherAuthMiddleware
{
    
    use GeneralTrait;
    
    public function handle($request, Closure $next)
    {
        if ($request->header('Authorization')) {
            if (Auth::guard('teacher')->check()) {
                try {
                    JWTAuth::parseToken()->authenticate();
                } catch (Exception $exception) {
                    if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                        return $this->returnError('301', __('Invalid Exception'));
                    } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                        return $this->returnError('301', __("Expired Exception"));
                    } else {
                        return $this->returnError('301', __("please login and return go to request"));
                    }
                }
                return $next($request);
            }
            return $this->returnError('301', __("please login and return go to request , Invalid Token"));
        }
        return $this->returnError('301', __("Enter Token"));
    }
    
}
