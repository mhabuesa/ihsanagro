<?php

namespace App\Http\Controllers;

use App\Models\DueListModel;
use App\Models\ExpenseModel;
use App\Models\IncomeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $incomeInYear = IncomeModel::all()->sum('amount');
        $expenseInYear = ExpenseModel::all()->sum('amount');

        $fund = $incomeInYear - $expenseInYear;
        return view('backend.index',[
            'fund'=>$fund,

        ]);
    }
    function note_count(){
        return view('backend.note_count');
    }
}
