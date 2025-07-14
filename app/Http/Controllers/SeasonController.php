<?php

namespace App\Http\Controllers;

use App\Models\SeasonModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    function season(){
        $seasons = SeasonModel::latest()->get();
        return view('backend.season.season', [
            'seasons'=>$seasons,
        ]);
    }

    function season_create(){
        return view('backend.season.season_add');
    }

    function season_store(Request $request){

        SeasonModel::insert([
            'name'=>$request->season_name,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'comment'=>$request->comments,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('season')->with('created', 'মৌসুম যুক্ত সফল হয়েছে');
    }

    function season_edit($id){
        $season = SeasonModel::find($id);
        return view('backend.season.season_edit',[
            'season'=>$season,
        ]);
    }

    function season_update(Request $request, $id){
        $season = SeasonModel::find($id);

        $season->update([
            'name'=>$request->season_name,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'comment'=>$request->comments,
        ]);
        return redirect()->route('season')->with('update', 'মৌসুম আপডেট সফল হয়েছে');
    }

}
