<?php

namespace App\Http\Controllers;
use App\Models\headFolder;
use App\Models\Folders;
use App\Models\DataFile;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index($id){ 
        return view('personal._personal',[
            'title'=>'PERSONAL DATA',
            'dataFolder'=>headFolder::all(),
            'folder'=>Folders::where(['id_user'=>auth()->user()->id, 'id_folder'=>$id ,'link'=>'PERSONAL DATA/'])->get(),
            'dataFile'=>DataFile::where(['id_user'=>auth()->user()->id,'link'=>'PERSONAL DATA/','id_folder'=>$id ])->get()
        ]); 
    }
    
    public function folders($nameFolder,$id){
        return view('personal._personal',[
            'title'=>$nameFolder,
            'dataFolder'=>headFolder::all(),   
            'folder'=>Folders::where(['id_user'=>auth()->user()->id, 'id_folder'=>'private', 'link'=>$nameFolder.'/'])->get(),
            'dataFile'=>DataFile::where(['id_user'=>auth()->user()->id,'link'=>$nameFolder.'/','id_folder'=>$id])->get()
        ]);
    }

    public function UpdateFolder(request $request){
        $data = folders::where('link',$request->link)->get();
        if($data->count()){
            folders::where('link',$request->link)->update([
                'link'=>$request->namaFolder.'/'  
            ]); 
            folders::where('id',$request->id_folder)->update([
                'name'=>$request->namaFolder,        
            ]);
        }else{  
            folders::where('id',$request->id_folder)->update([
                'name'=>$request->namaFolder,        
            ]);
        }
        DataFile::where('link',$request->link)->update(['link'=>$request->namaFolder.'/']);
        return redirect()->back();
    }

    public function DeleteFolder($id){
        folders::destroy($id);
        return redirect()->back();
    }

    public function uploadFile(request $request){
         
        $validasiGambar = $request->validate([
           'id_folder'=>'',
           'name'=> '',
           'type'=>'',
           'link'=> '',
           'id_user'=>'',
           'extention'=>'',
           'size'=>'',
           'file.*'=>'required'   
        ]);
       
        foreach ($request->file('file') as $item){ 
           
            $validasiGambar['name'] =$item->getClientOriginalName() ;
            $validasiGambar['type'] ='file' ;
            $validasiGambar['link'] = $request->link;
            $validasiGambar['id_user'] = auth()->user()->id;
            $validasiGambar['extention'] = $item->getClientOriginalExtension();
            $validasiGambar['size'] =$item->getSize();
            $validasiGambar['file']= $item->store('databaseFile');
            DataFile::create($validasiGambar);
        }

        $request->session()->flash('Berhasil', 'Benckmark Berhasil Ditambahkan');
        return redirect()->back();
        
    }
    public function embedVideo(request $request){
       
        DataFile::create([
            'id_folder'=>$request->id_folder,
            'name'=>$request->name,
            'type'=>'video',
            'link'=>$request->link,
            'id_user'=>$request->owner,
            'extention'=>'mp4',
            'size'=>'0',
            'file' =>$request->file
        ]);
        return redirect()->back();
    }

    public function fileDelete(request $request){
        // DataFile::where('id',$request->id)->update(['id_folder'=>'trash']);
        // return redirect()->back();

        if($request->odl_file){
            Storage::delete($request->old_file);
        }
        DataFile::destroy($request->id);
        return redirect()->back();
    }
    
    public function renameFile(request $request){
        
        DataFile::where('id',$request->id)->update([
            'name'=>$request->name,
            'file'=>$request->id_folder
            
        ]);
        return redirect()->back();
    }

    public function pdfview($nameFolder, $id){
        return view('partial._pdf_viewer',[
            'dataFile'=>DataFile::where(['id_user'=>auth()->user()->id,'link'=>$nameFolder.'/','id'=>$id])->get()
        ]);
    }
    public function docview($nameFolder, $id){
        return view('partial._office',[
            'dataFile'=>DataFile::where(['id_user'=>auth()->user()->id,'link'=>$nameFolder.'/','id'=>$id])->get()
        ]);
    }

    public function driveHapus(request $request){
        $id = $request->id;
        headFolder::where('id',$id)->delete();
        DataFile::where('id_folder',$id)->delete();
        folders::where('id_folder',$id)->delete();
        return redirect('/');
    }
}
