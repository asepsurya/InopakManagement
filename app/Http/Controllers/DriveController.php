<?php

namespace App\Http\Controllers;
use App\Models\headFolder;
use App\Models\Folders;
use App\Models\DataFile;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function add(request $request){
        $validasi = $request->validate([
            'link'=>'',
            'name'=>'required|unique:head_Folders',
            'id_user'=>'',
            'type'=>''
        ]);
        headFolder::create($validasi);
        return redirect()->back();
    }
    public function data($name, $id){ 
        if(request('search')){
            // folder Search
            $b = Folders::where('id_user',auth()->user()->id)->get('id');
            foreach($b as $a){
                if($a){
                    $data = Folders::where('name','like','%' . request('search') .'%')->get();
                    $file = DataFile::where('name','like','%' . request('search') .'%')->get();
                }
                return view('FolderData.data',[
                    'title'=>'Hasil Pencarian : '.request('search'),
                    'dataFolder'=>headFolder::all(),
                    'ambilID'=>headFolder::where('id',$id)->get(),
                    'dataFile'=>$file,
                    'folder'=>$data
                ]);              
            }    
                               
        }else{
            // Tidak Melakukan Pencaharian
            return view('FolderData.data',[
                'title'=>$name,
                'dataFolder'=>headFolder::all(),
                'ambilID'=>headFolder::where('id',$id)->get(),
                'dataFile'=>DataFile::where(['link'=>$name.'/','id_folder'=>$id])->get(),
                'folder'=>Folders::where([['link' , $name.'/'],['id_folder', $id]
                ])->get(),
            ]);
        }     
    }
    public function addFolder(request $request){
       $cek =  Folders::where(['name'=>$request->name,'link'=>$request->link,'id_folder'=>$request->id_folder])->get();
       foreach($cek as $a){

        if($a->name == $request->name){
            $h = 'required|unique:Folders';
        }else{
            $h='required';
        }    
        $validasi = $request->validate([
            'link'=>'',
            'name'=>$h,
            'id_user'=>'',
            'type'=>'',
            'id_folder'=>''
            ]); 
       }
        $validasi['link'] = $request->link;
        $validasi['name'] = $request->name;
        $validasi['id_user'] = $request->owner;
        $validasi['type'] = $request->type;
        $validasi['id_folder'] = $request->id_folder;
        Folders::create($validasi);
        return back()->with('gagal','Login Gagal!! Periksa Kembali Data Anda');  
    
    }
    public function renameDrive(request $request){
        $validasi = $request->validate(['name' =>'required|unique:head_folders','link'=>'']);
        $validasi['link'] = $request->name.'/';
        headFolder::where('id',$request->id_folder)->update($validasi);

        Folders::where('link',$request->link)->update([
            'link'=>$request->name.'/'
        ]);
        DataFile::where('link',$request->link)->update([
            'link'=>$request->name.'/'
        ]);
        return redirect('/home/'.$request->name.'/'.$request->id_folder);
    }
}

