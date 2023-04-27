<?php

namespace App\Controllers;

use App\Models\User;

class AdminController extends BaseController
{
    public function index()
    {
        $user = new User();
        
        echo 'Admin controller';
    }

}