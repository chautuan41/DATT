<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @param string|null ...$guards
    * @return mixed
    */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'admin':
            if (Auth::guard($guard)->check()) {
                return redirect('/admin');
            }
            break;
            default:
            if (Auth::guard($guard)->check()) {
            return redirect('/');
            }
            break;
        }
        return $next($request);
    }
    /**
    * @param \Illuminate\Http\Request $request
    * @param AuthenticationException $exception
    * @return \lluminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
    */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }
        $guard = Arr::get($exception->guards(), 0);
        switch($guard){
            case 'admin':
                $login = 'login-ad';
                break;
            case 'web':
                $login = 'user.login';
                break;
            default:
                $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }
}
