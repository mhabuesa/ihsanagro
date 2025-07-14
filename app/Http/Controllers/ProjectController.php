<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\ProjectModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function project(){
        $projects = ProjectModel::all();
        return view('backend.project.project', [
            'projects'=>$projects,
        ]);
    }
    function project_add(){
        return view('backend.project.project_add');
    }

    function project_store(ProjectRequest $request){

        ProjectModel::create([
            'project_name'=>$request->project_name,
            'address'=>$request->address,
            'start_date'=>$request->start_date,
            'land_amount'=>$request->land_amount,
            'land_owner'=>$request->land_owner,
            'owner_bill'=>$request->owner_bill,
            'installment'=>$request->installment,
            'lease_holder'=>$request->lease_holder,
            'lease_bill'=>$request->lease_bill,
            'lease_installment'=>$request->lease_installment,
            'contract_bill'=>$request->contract_bill,
            'duration'=>$request->duration,
            'comments'=>$request->comments,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->route('project')->with('created', 'প্রজেক্ট যুক্ত সফল হয়েছে');

    }

    function project_edit($id){
        $project = ProjectModel::find($id);

        return view('backend.project.project_edit', [
            'project'=>$project,
        ]);
    }

    function project_update(ProjectRequest $request, $id){
        $project = ProjectModel::find($id);

        $project->update([
            'project_name'=>$request->project_name,
            'address'=>$request->address,
            'start_date'=>$request->start_date,
            'land_amount'=>$request->land_amount,
            'land_owner'=>$request->land_owner,
            'owner_bill'=>$request->owner_bill,
            'installment'=>$request->installment,
            'lease_holder'=>$request->lease_holder,
            'lease_bill'=>$request->lease_bill,
            'lease_installment'=>$request->lease_installment,
            'contract_bill'=>$request->contract_bill,
            'duration'=>$request->duration,
            'comments'=>$request->comments,
        ]);
        return back()->with('update', 'প্রজেক্ট আপডেট সফল হয়েছে');
    }


}
