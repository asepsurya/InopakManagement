<?php

namespace App\Http\Controllers;
use App\Models\headFolder;
use App\Models\Folders;
use App\Models\DataFile;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function add(request $request){
        headFolder::create([
            'link'=>$request->link,
            'name'=>$request->namaFolder,
            'id_user'=>$request->owner,
            'type'=>$request->type,
            
        ]);
        return redirect()->back();
    }
    public function data($name, $id){ 
        if(request('search')){
            // folder Search
            $b = Folders::where('id_user',auth()->user()->id)->get('id');
            foreach($b as $a){
                if($a->id == auth()->user()->id){
                    $data = Folders::where('name','like','%' . request('search') .'%')->get();
                   
                }else{
                    $data = Folders::where([['name','like','%' . request('search') .'%'],['id_user','like','%' . auth()->user()->id .'%']])->get();
                }
            }
            // folder Search
            $b = DataFile::where('id_user',auth()->user()->id)->get('id');
            foreach($b as $a){
                if($a->id == auth()->user()->id){
                    $dataFile = DataFile::where('name','like','%' . request('search') .'%')->get();
                   
                }else{
                    $dataFile = DataFile::where([['name','like','%' . request('search') .'%'],['id_user','like','%' . auth()->user()->id .'%']])->get();
                }
            }
            return view('FolderData.data',[
                'title'=>'Hasil Pencarian : '.request('search'),
                'dataFolder'=>headFolder::all(),
                'ambilID'=>headFolder::where('id',$id)->get(),
                'dataFile'=>$dataFile,
                'folder'=>$data
            ]);
            
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

// ketika request lebih dari 3 step link
    // public Function showFolder($masterFolder, $folderName , $id){
    //     return view('FolderData.data',[
    //         'title'=>$folderName,
    //         'dataFolder'=>headFolder::all(),
    //         'ambilID'=>headFolder::where('id',$id)->get(),
    //         'folder'=>Folders::where([['id_folder'=> $id],['link'=>$folderName.'/']
    //         ])->get()
    //     ]);
    // }

    public function renameDrive(request $request){
        headFolder::where('id',$request->id_folder)->update([
            'name'=>$request->namaFolder,
            'link'=>$request->namaFolder.'/'
        ]);
        Folders::where('link',$request->link)->update([
            'link'=>$request->namaFolder.'/'
        ]);
        DataFile::where('link',$request->link)->update([
            'link'=>$request->namaFolder.'/'
        ]);
        return redirect('/home/'.$request->namaFolder.'/'.$request->id_folder);
    }
}

