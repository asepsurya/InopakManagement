@extends('layout.main')
@section('container')
    
    <div class="alert alert-pro alert-primary alert-dismissible">
        <div class="alert-text">
            <h6>Selamat Datang, {{ auth()->user()->name }}</h6>
    
            <p>Kami Percaya Pertumbuhan Ekonomi yang Kuat ditopang oleh UMKM yang Berkelanjutan</p>
            <p><strong>{{ date('l, d  M  Y') }} </strong> | <a href="https://inopakinstitute.or.id/" target="_blank"
                    rel="noopener noreferrer">https://inopakinstitute.or.id</a></p>
        </div>
        
    </div>
    <div class="card bg-transparent">
        <div class="card-inner py-3 border-bottom border-light rounded-0">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add Event</span></a>
                        
                    </div>
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Kalender Kegiatan</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" m-0">
        <div class="card-inner">
            <div id="calendar" class="nk-calendar"></div>
        </div>
    </div>
    

    <div class="modal fade" id="addEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Events</h5><a href="#" class="close" data-bs-dismiss="modal"
                        aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="/addEvent" id="addEventForm" class="form-validate is-alter" method="post">
                        @csrf
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group"><label class="form-label" for="event-title">Event Title</label>
                                    <div class="form-control-wrap"><input type="text" class="form-control"
                                            id="event-title" required name="title"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group"><label class="form-label">Start Date</label>
                                    <div class="row gx-2">
                                        <div class="">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left"><em class="icon ni ni-calendar"></em>
                                                </div><input type="text" id="event-start-date"
                                                    class="form-control date-picker" data-date-format="yyyy-mm-dd" required
                                                    name="start">
                                            </div>
                                        </div>
                                        {{-- <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left"><em class="icon ni ni-clock"></em>
                                            </div><input type="text" id="event-start-time"
                                                data-time-format="HH:mm:ss" class="form-control time-picker">
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group"><label class="form-label">End Date</label>
                                    <div class="row gx-2">
                                        <div class="">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left"><em class="icon ni ni-calendar"></em>
                                                </div><input type="text" id="event-end-date"
                                                    class="form-control date-picker" data-date-format="yyyy-mm-dd"
                                                    name="end">
                                            </div>
                                        </div>
                                        {{-- <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left"><em class="icon ni ni-clock"></em>
                                            </div><input type="text" id="event-end-time" data-time-format="HH:mm:ss"
                                                class="form-control time-picker">
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"><label class="form-label" for="event-description">Event
                                        Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="event-description" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"><label class="form-label">Event Category</label>
                                    <div class="form-control-wrap"><select id="event-theme"
                                            class="select-calendar-theme form-control" data-search="on" name="kategori">
                                            <option value="event-primary">Company</option>
                                            <option value="event-success">Seminars </option>
                                            <option value="event-info">Conferences</option>
                                            <option value="event-warning">Meeting</option>
                                            <option value="event-danger">Business dinners</option>
                                            <option value="event-pink">Private</option>
                                            <option value="event-primary-dim">Auctions</option>
                                            <option value="event-success-dim">Networking events</option>
                                            <option value="event-info-dim">Product launches</option>
                                            <option value="event-warning-dim">Fundrising</option>
                                            <option value="event-danger-dim">Sponsored</option>
                                            <option value="event-pink-dim">Sports events</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li><button type="submit" class="btn btn-primary">Add Event</button>
                                    </li>
                                    <li><button id="resetEvent" data-bs-dismiss="modal"
                                            class="btn btn-danger btn-dim">Discard</button></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Event</h5><a href="#" class="close" data-bs-dismiss="modal"
                        aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="/updateEvent" method="POST" class="form-validate is-alter">
                        @csrf

                        <input type="text" id="myid" name="id" hidden>
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group"><label class="form-label" for="edit-event-title">Event
                                        Title</label>
                                    <div class="form-control-wrap"><input type="text" class="form-control"
                                            id="edit-event-title" required name="title"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group"><label class="form-label" for="edit-event-description">Event
                                        Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="edit-event-description" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"><label class="form-label">Event Category</label>
                                    <div class="form-control-wrap"><select id="edit-event-theme" name="kategori"
                                            class="select-calendar-theme form-control" data-search="on">
                                            <option value="event-primary">Company</option>
                                            <option value="event-success">Seminars </option>
                                            <option value="event-info">Conferences</option>
                                            <option value="event-warning">Meeting</option>
                                            <option value="event-danger">Business dinners</option>
                                            <option value="event-pink">Private</option>
                                            <option value="event-primary-dim">Auctions</option>
                                            <option value="event-success-dim">Networking events</option>
                                            <option value="event-info-dim">Product launches</option>
                                            <option value="event-warning-dim">Fundrising</option>
                                            <option value="event-danger-dim">Sponsored</option>
                                            <option value="event-pink-dim">Sports events</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li><button type="submit" class="btn btn-primary">Update
                                            Event</button>
                    </form>
                    </li>
                    
                    </ul>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="previewEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div id="preview-event-header" class="modal-header">
                    <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5><a href="#"
                        class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <div class="row gy-3 py-1">
                        <div class="col-sm-6">
                            <h6 class="overline-title">Start Time + 1 day</h6>
                            <p id="preview-event-start"></p> 
                        </div>
                        <div class="col-sm-6" id="preview-event-end-check">
                            <h6 class="overline-title">End Time</h6>
                            <p id="preview-event-end"></p>
                        </div>
                        <div class="col-sm-10" id="preview-event-description-check">
                            <h6 class="overline-title">Description</h6>
                            <p id="preview-event-description"></p>
                        </div>
                    </div>
                    <ul class="d-flex justify-content-between gx-4 mt-3">
                        <li><button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editEventPopup"
                                class="btn btn-primary">Edit Event</button></li>
                                <li>
                                    <form action="/deleteEvent" method="post">
                                        @csrf
                                        <input type="text" id="myid2" name="id" hidden>
                                        <button type="submit" class="btn btn-danger btn-dim">Delete</button>
                                    </form>
                                  </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteEventPopup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal py-4"><em
                            class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This event data will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li><button data-bs-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete
                                    it</button></li>
                            <li><button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editEventPopup"
                                    class="btn btn-danger btn-dim">Cancel</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
