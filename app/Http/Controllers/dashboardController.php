<?php

namespace App\Http\Controllers;
use App\Models\headFolder;
use App\Models\DataFile;
use App\Models\Folders;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    Public function index(){
        return view('home',[
            'title'=>'Dashboard',
            'dataFolder'=>headFolder::all(), 
            'dataFile'=>DataFile::where('id_user',auth()->user()->id)->latest()->paginate(8), 
            'folders'=>Folders::where('id_user',auth()->user()->id)->latest()->paginate(8) 
        ]);
    }

}
