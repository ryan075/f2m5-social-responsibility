<?php
namespace Website\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class IsAuthenticated implements IMiddleware {
    public function handle(Request $request): void
    {
        $user = loggedInUser();

        if ($user === false) {
            redirect(url('login.form'));
            exit;
        }

        $request->user = $user;
    }
}