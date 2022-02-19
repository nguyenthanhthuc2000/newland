<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectCustomerControler extends Controller
{
    public function index(){
        $lstProject = $this->projectRepo->getByAttributes(['status' => 1]);
        $data = [
            'title' => 'Danh sách dự án',
            'list' => $lstProject
        ];
        return view('pages.project.project_list', $data);
    }

    public function detail($slug){
        $project = $this->projectRepo->getItemsBySlug($slug);
        $data = [
            'title' => $project->name,
            'detail' => $project
        ];
        return view('pages.project.detail', $data);
    }
}
