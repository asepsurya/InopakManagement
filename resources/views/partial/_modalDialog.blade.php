{{-- Mmodal sidebar Tambah drive Folder --}}
<div class="modal fade" tabindex="-1" id="modalSmall">
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
                        @php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);   
                        @endphp
                        <input type="text" value="{{ $title }}/" name="link" hidden>
                        <input type="text" value="{{ auth()->user()->id }}" name="owner" hidden>
                        <input type="text" value="folder" name="type" hidden>
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

