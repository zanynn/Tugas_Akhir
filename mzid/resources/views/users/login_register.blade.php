@extends('frontEnd.layouts.master')
@section('title','Login Register | MZ.ID')
@section('slider')
@endsection
@section('content')
<div class="container" style="margin-top: 200px;">
    <div style="margin-bottom: 20px;"></div><br><br><br><br>
    @endsection
    <section class="logreg">
        <div class="container-log">
            <div class="user signinbx">
                <div class="imgbx-log"><img src="https://i.pinimg.com/originals/da/7e/b8/da7eb810c2040b00fee97537ea924b60.jpg" style="height: 500px; width: 400px;"></div>
                <div class="formbx-log">
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                        @if(Session::has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <h2> Sign In</h2>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <p class="signup">Don't have an account ? <a type="submit" href="#" onclick="toggleForm();">Sign Up</a></p>
                    </form>
                </div>
            </div>
            <div class="user signupbx">
                <div class="formbx-log">
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                        @if(Session::has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <h2>Create an Account</h2>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" name="name" placeholder="Username" value="{{old('name')}}">
                        <span class="text-danger">{{$errors->first('name')}}</span>

                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                        <span class="text-danger">{{$errors->first('email')}}</span>

                        <input type="hidden" name="role" value="User">
                        <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
                        <span class="text-danger">{{$errors->first('password')}}</span>

                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <p class="signup">Already have an account ? <a href="#" onclick="toggleForm();">Sign In</a></p>
                    </form>
                </div>
                <div class="imgbx-log"><img src="https://p.favim.com/orig/2018/08/06/party-aesthetic-night-Favim.com-6136337.jpg" style="height: 500px; width: 400px;"></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function toggleForm() {
            var containerLog = document.querySelector('.container-log');
            containerLog.classList.toggle('active')
        }
    </script>