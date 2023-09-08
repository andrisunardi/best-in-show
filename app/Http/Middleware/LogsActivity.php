<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LogsActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Str::contains($request->fullUrl(), '/livewire/message/')) {
            if (auth()->check()) {
                $user = auth()->user();

                activity()
                    ->causedBy($user)
                    ->event('viewed')
                    ->log("{$user->name} - {$request->fullUrl()}");
            } else {
                activity()
                    ->event('viewed')
                    ->log("{$request->ip()} - {$request->userAgent()} - {$request->fullUrl()}");
            }
        }

        return $next($request);
    }
}
