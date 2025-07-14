<?php

namespace App\Http\Controllers;

use App\Models\DueListModel;
use App\Models\ExpenseModel;
use App\Models\IncomeModel;
use App\Models\Profile;
use App\Models\ProjectModel;
use App\Models\SeasonModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    function income(){
        $incomes = IncomeModel::latest()->get();
        return view('backend.account.income', compact('incomes'));
    }

    function add_income(){
        $projects = ProjectModel::all();
        return view('backend.account.add_income', compact('projects'));
    }

    function income_store(Request $request){
        $request->validate([
            'amount'=>'required',
        ]);


        if($request->project == ''){

           IncomeModel::insert([
            'project_id'=>'0',
            'amount'=>$request->amount,
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),
           ]);

        }
        else{

            IncomeModel::insert([
                'project_id'=>$request->project,
                'amount'=>$request->amount,
                'comment'=>$request->comment,
                'created_at'=>Carbon::now(),
               ]);

        }

        return redirect()->route('income')->with('added', 'আয় যুক্ত সফল হয়েছে।');

    }

    function income_edit($id){
        $projects = ProjectModel::all();
        $income = IncomeModel::find($id);
        return view('backend.account.edit_income', compact('projects','income'));

    }
    function income_update(Request $request, $id){
        IncomeModel::find($id)->update([
            'project_id'=>$request->project,
            'amount'=>$request->amount,
            'comment'=>$request->comment,

           ]);
           return back()->with('added', 'আয় আপডেট সফল হয়েছে।');

    }


    function income_delete($id){
        try {
            $item = IncomeModel::findOrFail($id);
            $item->delete();

            return response()->json(['success' => 'মুছে ফেলা হয়েছে।']);
        } catch (Exception $e) {
            return response()->json(['error' => 'There was a problem deleting the item'], 500);
        }



    }

    function add_expense(){
        $projects = ProjectModel::all();
        $profiles = Profile::all();
        return view('backend.account.add_expense', compact('projects', 'profiles'));
    }

    function expense_store(Request $request){
        $request->validate([
            'purpose'=>'required',
            'amount'=>'required',
        ]);


        ExpenseModel::insert([
            'purpose'=>$request->purpose,
            'amount'=>$request->amount,
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),
           ]);


        return back()->with('added', 'খরচ যুক্ত সফল হয়েছে।');

    }

    function expense_store_project(Request $request){
        $request->validate([
            'project_id'=>'required',
            'expense_type'=>'required',
            'expense_purpose'=>'required',
            'expense_amount'=>'required',
            'profile_id'=>'required',
        ]);


        if($request->expense_type == 0){

            ExpenseModel::insert([
                'project_id'=>$request->project_id,
                'type'=>$request->expense_type,
                'purpose'=>$request->expense_purpose,
                'amount'=>$request->expense_amount,
                'profile_id'=>$request->profile_id,
                'comment'=>$request->expense_comment,
                'created_at'=>Carbon::now(),
               ]);

            DueListModel::insert([
                'project_id'=>$request->project_id,
                'purpose'=>$request->expense_purpose,
                'amount'=>$request->expense_amount,
                'created_at'=>Carbon::now(),
               ]);

        }
        else{
            ExpenseModel::insert([
                'project_id'=>$request->project_id,
                'type'=>$request->expense_type,
                'purpose'=>$request->expense_purpose,
                'amount'=>$request->expense_amount,
                'profile_id'=>$request->profile_id,
                'comment'=>$request->expense_comment,
                'created_at'=>Carbon::now(),
               ]);

        }




        return back()->with('added', 'খরচ যুক্ত সফল হয়েছে।');

    }

    function expense(){
        $seasons = SeasonModel::latest()->get();
        $normal_expense = ExpenseModel::where('project_id', null)->latest()->get();
        $project_expense = ExpenseModel::where('project_id', '!=', '')->latest()->get();

        return view('backend.account.expense', compact('normal_expense', 'project_expense','seasons'));
    }
    function expense_profile(){
        $profiles = Profile::latest()->get();
        return view('backend.account.expense_profile', compact('profiles'));
    }
    function expense_profile_store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        Profile::create([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
           ]);
           return back()->with('success', 'প্রফাইল যুক্ত সফল হয়েছে।');

    }
    function expense_profile_update(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);

        Profile::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
           ]);
           return back()->with('success', 'প্রফাইল আপডেট সফল হয়েছে।');

    }

    function expense_profile_show($id){
        $profile = Profile::find($id);
        $profiles = ExpenseModel::where('profile_id', $id)->get();
        $total = ExpenseModel::where('profile_id', $profile->id)->sum('amount');
        return view('backend.account.expense_profile_show', compact('profiles', 'profile'));
    }

    function expense_profile_filter(Request $request, $id){

        $request->validate([
            'start'=>'required',
            'end'=>'required',
        ]);
        $start = $request->start;
        $end = $request->end;

        $profiles = ExpenseModel::where('profile_id', $id)->whereDate('created_at', '>=', $start)
        ->whereDate('created_at', '<=', $end)
        ->latest()->get();
        $profile = Profile::find($id);
        return view('backend.account.expense_profile_show', compact('profiles', 'profile'));

    }

    function expense_filter(Request $request){

        $request->validate([
            'start'=>'required',
            'end'=>'required',
        ]);
        $start = $request->start;
        $end = $request->end;

        $normal_expense = ExpenseModel::whereDate('created_at', '>=', $start)
        ->whereDate('created_at', '<=', $end)
        ->where('project_id', null)
        ->latest()->get();
        $project_expense = ExpenseModel::where('project_id', '!=', '')
                        ->whereDate('created_at', '>=', $start)
                        ->whereDate('created_at', '<=', $end)
                        ->latest()->get();
        return view('backend.account.expense', compact('normal_expense', 'project_expense'));

    }


    function expense_delete($id){

        try {
            $item = ExpenseModel::findOrFail($id);
            $item->forceDelete();

            return response()->json(['success' => 'Item deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'There was a problem deleting the item'], 500);
        }


    }

    function expense_trash(){
        $expenses = ExpenseModel::onlyTrashed()->get();
        return view('backend.account.expense_trash', compact('expenses'));
    }

    function expense_per_delete($id){
        ExpenseModel::withTrashed()->where('id',$id)->forceDelete();
        return back()->with('per_delete', 'খরচ মুছে ফেলা হয়েছে।');
    }

    function expense_restore($id){
        ExpenseModel::withTrashed()->where('id',$id)->restore();
        return back()->with('restore', 'খরচ ফিরে আনা হয়েছে।');
    }

}
