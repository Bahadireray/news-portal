<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;

class LogActivityController extends Controller
{
    public function index()
    {
        $data = LogActivity::query()->orderBy('id', 'desc')->paginate();

        return view('admin.log_index', ['data' => $data]);
    }
}
