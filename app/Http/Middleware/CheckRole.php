<?php

namespace ConstruLink\Http\Middleware;

use Closure;
use ConstruLink\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * CheckRole constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        if(Auth::user()->role != $role)
        {
            return redirect('/login');
        }

        return $next($request);
    }
}
