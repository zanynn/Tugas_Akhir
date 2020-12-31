<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function account()
    {
        $province = DB::table('provinces')->get();
        $user_login = User::where('id', Auth::id())->first();
        return view('users.account', compact('province', 'user_login'));
    }
    public function updateprofile(Request $request, $id)
    {
        $update_account = User::find($id);
        $update_account->name = $request->name;
        if ($update_account->image && file_exists(storage_path('app/public/' . $update_account->image))) {
            \Storage::delete('public' . $update_account->image);
        }
        $image = $request->file('image')->store('/images', 'public');
        $update_account->image = $image;
        $update_account->address = $request->address;
        $update_account->city = $request->city;
        $update_account->province = $request->province;
        $update_account->pincode = $request->pincode;
        $update_account->mobile = $request->mobile;
        $update_account->save();
        return back()->with('success', 'Profil berhasil diubah!');
    }
    public function updatepassword(Request $request, $id)
    {
        $oldPassword = User::where('id', $id)->first();
        $input_data = $request->all();
        if (Hash::check($input_data['password'], $oldPassword->password)) {
            $this->validate($request, [
                'newPassword' => 'required|min:6|max:12|confirmed'
            ]);
            $new_pass = Hash::make($input_data['newPassword']);
            User::where('id', $id)->update(['password' => $new_pass]);
            return back()->with('success', 'Password berhasil diubah!');
        } else {
            Alert::error('Oops...', 'Kata Sandi Lama Salah');
            return back();
        }
    }
}
