<?php

namespace App\controllers\front;

use App\core\Controller;

class MainController extends Controller { 
    
    public function login() {
      
            $this->view('main/login');
    }

    public function User(){

        $this->view('main/User');
    }
}
 


