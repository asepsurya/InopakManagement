@extends('layout.main')
@section('container')

{{-- Modal Video Player --}}
@foreach ($dataFile as  $data )
<div class="modal fade" tabindex="-1" id="showFile-{{ $data->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0 m-0">
                @if ($data->extention == "mp4")
                <iframe width="100%" height="450" src="{{'https://www.youtube.com/embed/'.$data->file }}"  loading="lazy" allowfullscreen style="display: block;
                    width: 100%;
                    border: none;
                    overflow-y: auto;
                    overflow-x: hidden;">
                </iframe> 
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($ambilID as  $data )
<div class="modal fade" tabindex="-1" id="ModalEditDrive-{{ $data->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/renameDrive" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ $data->id }}" name="id_folder" hidden>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" value="{{ $data->name }}" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="namaFolder"><label class="form-label-outlined"
                                for="outlined-right-icon" >Nama Folder</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Rename</span></button></form></div>
        </div>
    </div>
</div>
@endforeach

@foreach ($folder as  $data )
<div class="modal fade" tabindex="-1" id="modalEditPublic-{{ $data->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/RenameFolder" method="post">
                    @csrf
                    <div class="form-group">
                     
                        <input type="text" value="{{ $data->name }}/" name="link" hidden >
                        <input type="text" value="{{ $data->id }}" name="id_folder" hidden>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" value="{{ $data->name }}" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="namaFolder"><label class="form-label-outlined"
                                for="outlined-right-icon" >Nama Folder</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Simpan</span></button></form></div>
        </div>
    </div>
</div>                        
@endforeach
{{-- embedd Video --}}
<div class="modal fade" tabindex="-1" id="modalEmbedVideo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Link Video</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                
                <form action="/aksi/embedVideo" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ auth()->user()->id }}" name="owner" hidden>
                        <input type="text" value="file" name="type" hidden>
                        <input type="text" value="{{  request()->route('id') }}" name="id_folder" hidden>
                       
                        
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="name" required><label class="form-label-outlined"
                                for="outlined-right-icon">Video Name</label>
                        </div>
                        <hr>
                        <div class="form-group"><label class="form-label">Enter a YouTube URL</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                name="base" required id="myUrl"><label class="form-label-outlined"
                                for="outlined-right-icon">https://</label>
                        </div>
                        <br>
                        <div class="form-group"><label class="form-label">ID Video</label><span class="form-note">ID Otomatis dikonversi dari Link Video</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                name="file" required id="youtubeid" readonly><label class="form-label-outlined"
                                for="outlined-right-icon"></label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" id="simpan" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Simpan</span></button></form>   
                <button class="btn btn-primary btn-block" id="myBtn">Upload</button></div>
        </div>
    </div>
</div>
{{-- add File  --}}
<div class="modal fade" tabindex="-1" id="addFile1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/uploadFile" method="post" enctype="multipart/form-data">
                    @csrf
                            <input type="text" value="{{ request()->route('id') }}" name="id_folder" hidden >
                            <input type="text" value="{{ $title }}/" name="link" hidden>
                    <div class="form-control-wrap">
                        <div class="form-group"><label class="form-label">Management Upload File</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-file">  
                            <input type="file" class="form-file-input" id="customFile" multiple name="file[]">
                            <label class="form-file-label" for="customFile">Choose file</label>
                         </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Upload</span></button></form></div>
        </div>
    </div>
</div>
{{-- Rename embedd Video --}}
@foreach ($dataFile as $data )
<div class="modal fade" tabindex="-1" id="modalEditEmbedVideo-{{ $data->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rename File</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/aksi/renameFile" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $data->id }}" name="id" hidden>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="name" value="{{ $data->name }}"><label class="form-label-outlined"
                                for="outlined-right-icon">Name</label>
                        </div>
                        
                       
                        <hr>
                        <div class="form-group"><label class="form-label">Link Video</label><span class="form-note">Specify the URL if your main website is external.</span></div>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-link"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="id_folder" value="{{ $data->file }}" required><label class="form-label-outlined"
                                for="outlined-right-icon">https://</label>
                        </div>
                    
                        
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Upload</span></button></form></div>
        </div>
    </div>
</div>
@endforeach

<div class="nk-fmg-listing nk-block">
    <div class="nk-fmg-listing nk-block">
        <div class="nk-files nk-files-view-grid">
            <div class="nk-files-head">
                <div class="nk-file-item">
                    <div class="nk-file-info">
                        <div class="dropdown">
                            <div class="tb-head dropdown-toggle dropdown-indicator-caret" data-bs-toggle="dropdown">Last
                                Opened</div>
                            <div class="dropdown-menu dropdown-menu-xs">
                                <ul class="link-list-opt no-bdr">
                                    <li><a class="active" href="#"><span>Last Opened</span></a></li>
                                    <li><a href="#"><span>Name</span></a></li>
                                    <li><a href="#"><span>Size</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-pro alert-danger alert-dismissible">
                <div class="alert-text">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                <button class="close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            {{-- Folder List --}}
            <div class="nk-files-list">
                @foreach ($folder as $folder )
                    <div class="nk-file-item nk-file">
                    <div class="nk-file-info">
                        <div class="nk-file-title">
                            <div class="nk-file-icon">
                                <a class="nk-file-icon-link" href="#">
                                <span
                                        class="nk-file-icon-type"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            viewBox="0 0 72 72">
                                            <path fill="#6C87FE"
                                                d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                            </path>
                                            <path fill="#8AA3FF"
                                                d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                            </path>
                                            <path display="none" fill="#8AA3FF"
                                                d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                            </path>
                                            <path fill="#798BFF"
                                                d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z"></path>
                                        </svg>
                                    </span>
                                </a>
                                 </div>
                            <div class="nk-file-name">
                                <div class="nk-file-name-text"><a href="/home/{{''.$folder->name.'/'.$folder->id_folder }}" class="title">{{ $folder->name }}</a>
                                    <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                                                class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                </div>
                            </div>
                        </div>
                        <ul class="nk-file-desc">
                            <li class="date">Created at : {{ $folder->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                    <div class="nk-file-actions">
                        <div class="dropdown"><a href="#"
                                class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                data-bs-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-plain no-bdr">
                                    <li><a data-bs-toggle="modal" data-bs-target="#modalEditPublic-{{ $folder->id }}"><em
                                                class="icon ni ni-pen"></em><span>Rename</span></a>
                                    </li>
                                    <li>
                                        <a href="/aksi/DeleteFolder/{{ $folder->id }}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach 
                 {{-- File List --}}
                @foreach ($dataFile as $a )
                <div class="nk-file-item nk-file">
                    <div class="nk-file-info">
                        <div class="nk-file-title">
                            {{-- Icon  --}}
                            @include('partial._icon')
                            <div class="nk-file-name">
                                <div class="nk-file-name-text">
                                                                       
                                    @if ($a->extention == 'pdf')
                                         <a href="#" onclick="window.open('/aksi/pdfview/{{ $a->link }}','_blank', 'fullscreen=yes')" class="title">{{Str::limit($a->name , 30) }}</a>
                                     @elseif ($a->extention == 'jpg' )
                                         <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                     @elseif ($a->extention == 'png' )
                                         <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                     @elseif ($a->extention == 'jpeg' )
                                         <a class="title gallery-image popup-image" href="{{ asset('storage/'.$a->file) }}">{{ Str::limit($a->name , 30) }}</a>
                                     @elseif($a->extention == 'mp4')
                                         <a data-bs-toggle="modal" data-bs-target="#showFile-{{ $a->id }}" class="title">{{ Str::limit($a->name , 30) }}</a>
                                     @else
                                         <a href="#" class="title">{{ Str::limit($a->name , 30) }}</a>
                                     @endif
                                         <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                 </div>
                            </div>
                        </div>
                        <ul class="nk-file-desc">
                            <li class="date">{{ $a->created_at->diffForHumans() }}</li>
                            <li class="size">
                            @if ($a->size >= 1073741824)
                                {{ $a->size = number_format($a->size / 1073741824, 2) . ' GB'; }}
                            @elseif($a->size >= 1048576)
                                {{ $a->size = number_format($a->size / 1048576, 2) . ' MB'; }}
                            @elseif($a->size  >= 1024)
                                {{ $a->size = number_format($a->size / 1024, 2) . ' KB'; }}
                            @elseif($a->size  > 1)
                                {{ $a->size = $a->size . ' KB'; }}
                            @elseif($a->size  = 1)
                                {{ $a->size = $a->size . ' KB'; }}
                            @else
                                {{ $a->size = '0 bytes';  }}
                            @endif
                            </li>
                            <li class="members">3 Members</li>
                        </ul>
                    </div>
                    <div class="nk-file-actions">
                        <div class="dropdown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-plain no-bdr">
                                    <li><a href="{{ asset('storage/'.$a->file) }}" target="blank_" download="{{ $a->name }}"><em
                                                class="icon ni ni-download"></em><span>Download</span></a></li>
                                    <li><a data-bs-toggle="modal" data-bs-target="#modalEditEmbedVideo-{{ $a->id }}"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>
                                    <li>
                                        <form action="/aksi/Deletefile/" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $a->id }}" hidden> 
                                        <input type="text" name="old_file" value="{{ $a->file }}" hidden> 
                                        <button type="submit" class="btn text-danger"><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                        </form>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>                                     
        </div>
    </div>
</div>

{{-- Modal add Folder Public--}}
<div class="modal fade" tabindex="-1" id="modalPublic">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Folder Baru</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/createFolder" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ auth()->user()->id }}" name="owner" hidden>
                        <input type="text" value="folder" name="type" hidden>
                        
                        @foreach ($ambilID as $a )
                            <input type="text" value="{{ $a->id }}" name="id_folder" hidden>
                         @endforeach
                        
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="name" required><label class="form-label-outlined"
                                for="outlined-right-icon">Nama Folder</label>
                        </div>
                       
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Create</span></button></form></div>
        </div>
    </div>
</div>

{{-- Modal update drive Folder --}}
<div class="modal fade" tabindex="-1" id="#a">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Folder Baru</h5><a href="#" class="close" data-bs-dismiss="modal"
                    aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form action="/createDrive" method="post">
                    @csrf
                    <div class="form-group">
                      
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right"><em class="icon ni ni-folder"></em></div><input
                                type="text" class="form-control form-control-xl form-control-outlined"
                                id="outlined-right-icon" name="namaFolder"><label class="form-label-outlined"
                                for="outlined-right-icon">Nama Folder</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-light"><button type="submit" class="btn btn-primary btn-block">
                <em class="icon ni ni-folder-plus"></em> <span>Create</span></button></form></div>
        </div>
    </div>
</div>

@endsection