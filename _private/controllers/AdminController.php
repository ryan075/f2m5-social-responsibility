<?php

namespace Website\Controllers;

class AdminController {

    public function adminHome() {
        $request = request();

        $template_engine = get_template_engine();
        echo $template_engine->render('admin/index', ['user' => $request->user]);
    }
    
    public function CMS() {
        $template_engine = get_template_engine();
        echo $template_engine->render('');
    }
}