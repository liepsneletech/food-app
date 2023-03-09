<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class RolesAuth
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, $roles)
  {
    if (!auth()->check()) {
      $userRole = User::ROLES['guest'];
    } else {
      $userRole = auth()->user()->role;
    }

    $middlewareRoles = explode('|', $roles);
    $middlewareRoles = array_map(fn ($role) => User::ROLES[$role], $middlewareRoles);

    if (in_array($userRole, $middlewareRoles)) {
      return $next($request);
    }

    abort(401);

    return $next($request);
  }
}
