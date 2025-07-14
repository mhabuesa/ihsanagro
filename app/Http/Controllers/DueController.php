<?php

namespace App\Http\Controllers;

use App\Models\DueListModel;
use Illuminate\Http\Request;

class DueController extends Controller
{
    function dueList(){
        $dueData = DueListModel::latest()->get();
        return view('backend.due.due',compact('dueData'));
    }
}
