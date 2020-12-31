@extends('admin.layouts.master')

@section('title', 'Lihat Data User | MZ.ID')
@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs mb-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <div class="media mb-2">
                            <a class="mr-2" href="#">
                                <img src="{{'/storage/'.$users->image}}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$users->name}}</h4>
                                <div class="col-12 px-0 d-flex">
                                    @if($users->role == 'User')
                                    <span class="badge badge-success badge-pill">User</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Administrator</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form novalidate>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{$users->name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{$users->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Role</label>
                                            <input type="text" class="form-control" value="{{$users->role}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Status</label>
                                            <input type="text" class="form-control" value="Active" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Dibuat Pada</label>
                                            <input type="text" class="form-control" value="{{$users->created_at}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Terakhir Diubah</label>
                                            <input type="text" class="form-control" value="{{$users->updated_at}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="mb-1"><i class="icon-user mr-25"></i>Personal Info</h5>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" value="{{$users->address}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kota</label>
                                            <input type="tex" class="form-control" value="{{$users->city}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>province</label>
                                            <input type="text" class="form-control" value="{{$users->province}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kode Pin</label>
                                            <input type="text" class="form-control" value="{{$users->pincode}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" value="{{$users->mobile}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection