<?php

namespace Website\Controllers;

class StdUserController {
    public function userDashboard() {
        notLoggedInYet();
        $template_engine = get_template_engine();
        echo $template_engine->render('dashboard/index');
    }

}