@extends('admin.layouts.master')

@section('title', 'Edit Data User | MZ.ID')

@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-header">
            @if($users->id == Auth::user()->id)
            <h4 class="card-title" id="bordered-layout-basic-form">Edit Profile</h4>
            @else
            <h4 class="card-title" id="bordered-layout-basic-form">Edit Data User</h4>
            @endif
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                    <li><a data-action="reload"><i class="fa fa-repeat" aria-hidden="true"></i></a></li>
                    <li><a data-action="expand"><i class="fa fa-window-maximize" aria-hidden="true"></i></a></li>
                    <li><a data-action="close"><i class="fa fa-times" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">

                <div class="tab-content">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <form action="/admin/user/update/{{$users->id}}" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="media mb-2">
                                <a class="mr-2" href="#">
                                    <img src="{{'/storage/'.$users->image}}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$users->name}}</h4>
                                    <div class="col-12 px-0 d-flex">
                                        <input type="file" class="btn btn-sm btn-primary mr-25" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{$users->name}}" name="name" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{$users->email}}" name="email" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Role</label>
                                            <input type="text" class="form-control" value="{{$users->role}}" name="role" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>




                            <h5 class="mb-1"><i class="icon-user mr-25"></i>Personal Info</h5>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" value="{{$users->address}}" name="address" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kota</label>
                                            <input type="text" class="form-control" value="{{$users->city}}" name="city" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Provinsi</label>
                                            <input type="text" class="form-control" value="{{$users->province}}" name="province" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kode Pin</label>
                                            <input type="text" class="form-control" value="{{$users->pincode}}" name="pincode" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Nomor Hp</label>
                                            <input type="text" class="form-control" value="{{$users->mobile}}" name="mobile" required="required">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Foto Profil</label>
                                        <input type="file" class="form-control"  name="image" required="required">
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection