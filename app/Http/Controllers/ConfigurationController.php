<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConfigurationController extends Controller
{
    

   
//-------- Note -------- admin ------------------------------------------##########################################

    public function adminShowNotes()
    {
        $notes=\App\Models\Note::all();
        return view('admin.adminShowNotes',compact('notes'));
    }

    public function adminAddNote()
    {
        return view('admin.adminAddNote');
    }

    public function adminAddNotePost(Request $request)
    {
        $note= new \App\Models\Note();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        if ($request->hasfile('lien'))
        {
            $file=$request->file('lien');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('note/', $filename);
            $note->lien=$filename;
        }

        $note->save();

        return redirect()->route('adminShowNotes');
    }

    public function adminEditNote($id)
    {
        $selectednote=\App\Models\Note::where('id',$id)->first();
        return view('admin.adminEditNote',compact('selectednote'));
    }

    public function adminEditNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        if ($request->hasfile('lien'))
        {
            if (File::exists('note/'.$note->lien))
            {
                File::delete('note/'.$note->lien);
            }

            $file=$request->file('lien');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('note/', $filename);
            $note->lien=$filename;
        }

        $note->update();

        return redirect()->route('adminShowNotes');
    }

    public function adminDeleteNote($id)
    {
        $note=\App\Models\Note::find($id);
        return view('admin.adminDeleteNote',compact('note'));
    }

    public function adminDeleteNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        
        if (File::exists('note/'.$note->lien))
            {
                File::delete('note/'.$note->lien);
            }

        $note->delete();

        return redirect()->route('adminShowNotes');
    }

 }

