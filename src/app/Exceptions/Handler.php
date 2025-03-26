<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (TokenMismatchException $e, Request $request) {
            return redirect('/product')->with('error', 'セッションが切れました。再度お試しください。');
        });
    }
}