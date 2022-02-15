<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class ProfileController extends Controller
{
    public function profile(){
        $find = Auth::user()->id;
        $acc = Account::find($find);
        $role = Role::all();
        return view('profile', ['acc' => $acc, 'role' => $role]);
    }

    public function update($id, Request $request){
        $find = Account::find($id);
        if($request->first != null){
            $find->first_name = $request->first;
        }
        if($request->middle != null){
            $find->middle_name = $request->middle;
        }
        if($request->last != null){
            $find->last_name = $request->last;
        }
        if($request->role != null){
            $find->role_id = $request->role;
        }
        if($request->gender != null){
            $find->gender_id = $request->gender;
        }
        if($request->email != null){
            $find->email = $request->email;
        }
        if($request->password != null){
            $find->password = Hash::make($request->password);
        }
        if($request->image != null){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;

            Storage::delete('public/'.$find->image);
            $find->display_picture_link = $imagePath;
        }

        $find->save();
        return view('saved');
    }

    public function maintenance(){
        $acc = Account::all();
        return view('acc-maintenance', ['acc' => $acc]);
    }

    public function updaterole($id){
        $acc = Account::where('id', $id)->first();
        $role = Role::all();
        return view('updaterole', ['acc' => $acc, 'role' => $role]);
    }

    public function update_role($id, Request $request){
        $acc = Account::where('id', $id)->first();
        $acc->role_id = $request->role;
        $acc->save();
        return redirect('acc_main');
    }

    public function sign_up(Request $request){
        $request->validate([
            'first' => 'required|alpha_num|max:25',
            'middle' => 'nullable|alpha_num|max:25',
            'last' => 'required|alpha_num|max:25',
            'gender' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => ['required', 'min:8', 'regex:.[0-9].'],
            // 'password' => 'required|min:8',
            'image' => 'required|image'
        ]);

        $file = $request->file('image');
        $imagename = time().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $imagename);
        $imagepath = 'images/'.$imagename;
        
        $acc = new Account();
        $acc->role_id = $request->role;
        $acc->gender_id = $request->gender;
        $acc->first_name = $request->first;
        if($request->middle != null){
            $acc->middle_name = $request->middle;
        }   
        $acc->last_name = $request->last;
        $acc->email = $request->email;
        $acc->password = Hash::make($request->password);
        $acc->display_picture_link = $imagepath;
        $acc->delete_flag = 0;
        $acc->save();
        return redirect('signin');
    }

    public function delete($id){
        $find = Account::find($id);
        $find->delete();
        return redirect()->route('acc_main', app()->getLocale());
    }
}
