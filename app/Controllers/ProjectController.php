<?php

namespace App\Controllers;

class ProjectController extends BaseController
{
    public function index()
    {
        $this->renderView('project/index');
    }
}