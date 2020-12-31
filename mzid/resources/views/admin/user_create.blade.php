@extends('admin.layouts.master')

@section('title', 'Tambah Data User | MZ.ID')

@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="bordered-layout-basic-form">Tambah Data User</h4>
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
                        <!-- users edit media object start -->
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form action="/admin/user/create" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Role</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Role" name="role" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required="required">
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
                                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="address" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kota</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Kota" name="city" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Provinsi</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Provinsi" name="province" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Kode Pin</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Kode Pin" name="pincode" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Nomor Hp</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Nomor Hp" name="mobile" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Profil</label>
                                        <input type="file" class="form-control" placeholder="Company name" name="image" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Tambahkan</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
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