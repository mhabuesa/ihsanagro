<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\ExpenseModel;
use App\Models\IncomeModel;
use App\Models\ProjectModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function project()
    {
        $projects = ProjectModel::all();
        return view('backend.project.project', [
            'projects' => $projects,
        ]);
    }
    function project_add()
    {
        return view('backend.project.project_add');
    }

    function project_store(ProjectRequest $request)
    {

        ProjectModel::create([
            'project_name' => $request->project_name,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'land_amount' => $request->land_amount,
            'land_owner' => $request->land_owner,
            'owner_bill' => $request->owner_bill,
            'installment' => $request->installment,
            'lease_holder' => $request->lease_holder,
            'lease_bill' => $request->lease_bill,
            'lease_installment' => $request->lease_installment,
            'contract_bill' => $request->contract_bill,
            'duration' => $request->duration,
            'comments' => $request->comments,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('project')->with('created', 'প্রজেক্ট যুক্ত সফল হয়েছে');
    }

    function project_edit($id)
    {
        $project = ProjectModel::find($id);

        return view('backend.project.project_edit', [
            'project' => $project,
        ]);
    }

    function project_update(ProjectRequest $request, $id)
    {
        $project = ProjectModel::find($id);

        $project->update([
            'project_name' => $request->project_name,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'land_amount' => $request->land_amount,
            'land_owner' => $request->land_owner,
            'owner_bill' => $request->owner_bill,
            'installment' => $request->installment,
            'lease_holder' => $request->lease_holder,
            'lease_bill' => $request->lease_bill,
            'lease_installment' => $request->lease_installment,
            'contract_bill' => $request->contract_bill,
            'duration' => $request->duration,
            'comments' => $request->comments,
        ]);
        return back()->with('update', 'প্রজেক্ট আপডেট সফল হয়েছে');
    }

    public function project_details(Request $request, $id)
    {
        $project = ProjectModel::find($id);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // আয়
        $incomesQuery = IncomeModel::where('project_id', $id);
        if ($startDate) {
            $incomesQuery->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $incomesQuery->whereDate('created_at', '<=', $endDate);
        }
        $incomes = $incomesQuery->get();
        $total_income = $incomes->sum('amount');

        // ব্যয়
        $expensesQuery = ExpenseModel::where('project_id', $id);
        if ($startDate) {
            $expensesQuery->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $expensesQuery->whereDate('created_at', '<=', $endDate);
        }
        $expenses = $expensesQuery->get();
        $total_expense = $expenses->sum('amount');

        return view('backend.project.project_details', [
            'project'        => $project,
            'incomes'        => $incomes,
            'expenses'       => $expenses,
            'total_income'   => $total_income,
            'total_expense'  => $total_expense,
        ]);
    }
}
