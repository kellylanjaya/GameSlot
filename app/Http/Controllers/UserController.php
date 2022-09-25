<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class UserController extends Controller{

    public function registUser(Request $request){
        $data =  [
            'name' => 'required',
            'email' => 'required',
            'password' =>'required',
            'gender' =>'required',
            'dob' => 'required',
        ];

        $validator = Validator::make($request->all(), $data);
        if($validator->fails()){
             return back()->withErrors($validator);
         }

        $user = User::create(request(['name','email','password','gender',"member",'userImage','dob']));
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

    public function loginUser(Request $request){
        $email = $request->email;
        $password = $request->password;

        $rememberMe = $request->rememberMe;

        $isvalid = auth()->attempt([
            'email' => $email,
            'password' => $password

        ]);

        if($isvalid){
            if($rememberMe){
                cookie::queue('username',$email,60);
                cookie::queue('password',$password,60);
            }
            return redirect('/');
        }else{
            return redirect('/login')->withErrors(new MessageBag(['Username or Password is error']));

        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function updateProfile(Request $request, $id){
        $rules =[
            'name' => 'required',
            'email' => 'required|unique:users,email',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find($id);

        if($user){
            $user->name = $request->name;
            $user->email = $request->email;

            $image = $request->image;
            $imageName = time().'.'.$image->getClientoriginalExtension();
            $request->image->move('profileimage',$imageName);
            $user->userImage = $imageName;



    }
        $user->save();

        return back();
    }

    public function updatePassword(Request $request,$id){
        $rules =[
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ];

        if(!Hash::check($request->oldPassword, auth()->user()->password)){
            return redirect('/profile')->with('error-credential', 'Wrong password');
        }

        if($request->newPassword != $request->confirmPassword){
            return redirect('/profile')->with('error-credential', 'Password do not match');
        }

        User::find($id)->update(['password'=> Hash::make($request->newPassword)]);

        return redirect('/profile');

    }
}
