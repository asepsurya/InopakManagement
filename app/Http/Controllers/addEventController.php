<?php

namespace App\Http\Controllers;
use App\Models\eventCalendar;
use Illuminate\Http\Request;

class addEventController extends Controller
{
    public function addEvent(request $request){
        $date = date('Y-m-d', strtotime("+1 day", strtotime($request->end))); 

       eventCalendar::create([
        'title'=>"'".$request->title."'",
        'start'=>"'".$request->start."'",
        'end'=> "'".$date."'",
        'kategori'=>"'fc-".$request->kategori."'",
        'description'=>"'".$request->description."'",
        'id_user'=>auth()->user()->id
       ]); 
       return redirect()->back();
    }

    public function updateEvent(request $request){
      
        eventCalendar::where('id',$request->id)->update([
            'title' => "'".$request->title."'",
            'description' => "'".$request->description."'",
            'kategori' => "'fc-".$request->kategori."'",
        ]);
        return redirect()->back();
    }

    public function deleteEvent(request $request){
        eventCalendar::where('id',$request->id)->delete();
        return redirect()->back();
    }
}
