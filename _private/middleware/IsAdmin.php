<?php
namespace Website\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class IsAdmin implements IMiddleware {
    public function handle(Request $request): void
    {
        $user = loggedInUser();

        if ($user === false) {
            redirect(url('login.form'));
            exit;
        }

        if ($user['admin'] == 0){
            redirect(url('std.home'));
            exit;
        }

        $request->user = $user;
    }
}