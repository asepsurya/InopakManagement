<?php

namespace App\Http\Controllers;
use App\Models\headFolder;
use App\Models\DataFile;
use App\Models\Folders;
use App\Models\eventCalendar;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    Public function index(){
        $events =[];
        $data = eventCalendar::all();
        foreach($data as $a){
            $events[] = [
                // 'id' => "'default-event-id-'"."+ Math.floor(9999999 * Math.random())",
                'id' => $a->id,
                'title' => $a->title,
                'start' => $a->start,
                'end' => $a->end,
                'className' => $a->kategori,
                'description' => $a->description,
            ];
        }
        $w =  preg_replace('/"/','',json_encode($events));
        return view('home',[
            'title'=>'Dashboard',
            'dataFolder'=>headFolder::all(), 
            'dataFile'=>DataFile::where('id_user',auth()->user()->id)->latest()->paginate(8), 
            'folders'=>Folders::where('id_user',auth()->user()->id)->latest()->paginate(8),
            'dataEvent'=> $events
        ])->with(compact('w'));
    }

}
