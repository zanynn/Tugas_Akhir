<header class="zanhead">
    <a href="#" class="logo-zan">MZ.ID</a>

    <ul class="navbar-collapse .collapse">
        <li class="nav-item {{Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><strong>Home</strong></a></li>
        <li><a href="{{url('/list-products')}}"><strong>Shop</strong></a></li>
        <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i><strong> Cart</strong> </a></li>
        @if(Auth::check())
        <li class="nav-item dropdown">
            @if(Auth::user()->image != null)
            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-test" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong> {{Auth::user()->name}}</strong><img class="user-nav" src="{{asset('storage/'.Auth::user()->image)}}" style="margin-left:10px; width: 40px; border-radius:50%;"></a>
            @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-test" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong> {{Auth::user()->name}}</strong><img class="user-nav" src="/img/usericon.png" style="margin-left:10px; width: 40px; border-radius:50%;"></a>
            @endif
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="zan-down-layout" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o"></i><span style="display:inline-block; width: 10px;"></span><strong>Edit Account</strong></a>
                <a class="zan-down-layout" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-key"></i><span style="display:inline-block; width: 10px;"></span><strong>Change Password</strong></a>
                <a class="zan-down-layout" href="{{ url('/logout') }}"><i class="fa fa-lock"></i><span style="display:inline-block; width: 10px;"></span><strong> Logout</strong> </a>
            </div>
        </li>
        @else
        <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i><strong> Login</strong> </a></li>
        @endif
    </ul>
</header>
<script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>
@if(Auth::check())
<?php
$user_login = DB::table('users')->where('id', Auth::id())->first();
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-zan">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/update-profile',$user_login->id)}}" method="post" class="form-horizontal" style="padding: 30px;" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field('PUT')}}
                    <legend>Account Profile</legend>
                    <div class="form-group {{$errors->has('name')?'has-error':''}} zan-group-input">
                        <input type="text" class="form-control" name="name" id="name" value="{{$user_login->name}}" placeholder="Name">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('address')?'has-error':''}}">
                        <input type="text" class="form-control" value="{{$user_login->address}}" name="address" id="address" placeholder="Address">
                        <span class="text-danger">{{$errors->first('address')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('city')?'has-error':''}}">
                        <input type="text" class="form-control" name="city" value="{{$user_login->city}}" id="city" placeholder="City">
                        <span class="text-danger">{{$errors->first('city')}}</span>
                    </div>
                    <div class="form-group">
                        <select name="province" id="province" class="form-control">
                            <?php
                            $province = DB::table('provinces')->get();
                            ?>

                            @foreach($province as $p)
                            <option value="{{$p->province_name}}" {{$user_login->province==$p->province_name?' selected':''}}>{{$p->province_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('pincode')?'has-error':''}}">
                        <input type="text" class="form-control" name="pincode" value="{{$user_login->pincode}}" id="pincode" placeholder="Pincode">
                        <span class="text-danger">{{$errors->first('pincode')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('mobile')?'has-error':''}}">
                        <input type="text" class="form-control" name="mobile" value="{{$user_login->mobile}}" id="mobile" placeholder="Mobile">
                        <span class="text-danger">{{$errors->first('mobile')}}</span>
                    </div>
                    <legend style="margin-top: 40px;">Avatar</legend>
                    <div class="form-group">
                        @if(Auth::user()->image != null)
                        <div class="upload-zan"></br>
                            <img class="product-img-medium" src="{{asset('storage/'.$user_login->image)}}" style="width: 100px; border-radius:50%; margin-top:20px;">
                            @else
                            <img class="product-img-medium" src="/img/usericon.png" style="width: 100px; border-radius:50%; margin-top:20px;">
                            @endif
                            <input type="file" name="image" style="margin-top: 60px; margin-left:30px;"></br>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="margin-top: 0;">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$oldPassword = DB::table('users')->where('id', Auth::id())->first();
?>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-zan">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/update-password',$user_login->id)}}" method="post" class="form-horizontal" style=" padding: 30px;">
                    <legend>Update New Password</legend>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field('PUT')}}
                    <div class="form-group {{$errors->has('password')?'has-error':''}}">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                        @if(Session::has('oldpassword'))
                        <span class="text-danger">{{Session::get('oldpassword')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('newPassword')?'has-error':''}}">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                        <span class="text-danger">{{$errors->first('newPassword')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('newPassword_confirmation')?'has-error':''}}">
                        <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="Confirm Password">
                        <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="margin-top: 0;">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif