<?php

namespace App\Http\Controllers;

use App\Models\NoteModel;
use Illuminate\Http\Request;
use Exception;

class NoteController extends Controller
{
    function note(){
        $notes = NoteModel::latest()->get();
        return view('backend.note.note', compact('notes'));
    }

    function note_store(Request $request){
       NoteModel::create([
            'title'=>$request->title,
            'note'=>$request->note,
       ]);
       return back()->with('added', 'নোট যুক্ত সফল হয়েছে।');
    }

    function note_delete($id){

      try {
         $item = NoteModel::findOrFail($id);
         $item->delete();
 
         return response()->json(['success' => 'Item deleted successfully']);
     } catch (Exception $e) {
         return response()->json(['error' => 'There was a problem deleting the item'], 500);
     }

    }

    function note_edit($id){

       $note = NoteModel::find($id);
       return view('backend.note.note_edit', compact('note'));
    }
    function note_update(Request $request, $id){

        NoteModel::find($id)->update([
            'title'=>$request->title,
            'note'=>$request->note,
            ]);
        return back()->with('update', 'নোট আপডেট সফল হয়েছে।');
     }
}
