<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    //

   
    public function user()
    {
        $id = Auth::user()->id;
        $data =  User::find($id)->orders;
        return view('layouts.user', compact('data'));
        
    }

    public function editPic(Request $request){
        $id = Auth::user()->id;
         $data = User::find($id);

         $request->validate([
          'img'=> 'required|mimes:jpg,png,jpeg|max:5048'
         ]);
       


         $FileName =  time().'-'.$data->name . '.'.$request->img->extension();
         $file= $request->img->storeAs('img', $FileName , 'public');
         $data-> img =$FileName; /// cloum name
         $data->update();
         return redirect('user');
       }
    
       public function updateuser(Request $request)
       {
         $user = Auth::user();

         $request->validate([
          'name'=> 'required|alpha',
          'email'=> 'required|email',
          'phone'=> 'required|numeric|digits:10',
         ]);
         
         $user->name=$request->input('name');
         $user->phone=$request->input('phone');
         $user->email=$request->input('email');
         $user->update();
         return redirect('/user')->with('message','The data has been updated successfully');
       
       }

       public function logAdmin(){
        return view('admin.loginAdmain');
      }
    
      public function LoginAdmin(Request $request){
        $email= request('adminEmail');
        $pass= request('adminPass');
        if (Auth::attempt(['email' => $email, 'password' => $pass, 'is_admin' => 1]))
        {
          $request->session()->put('loginId', Auth::user()->id);
          // session()->put('Login', 1);
            return redirect('/crud')->with('id',Auth::user()->id);
        }else{
            return redirect('/logAdmin')->with('message','Email or password is wrong');
        }
    }


    public function logout(){
      if(Session::has('loginId')){
        Session::pull('loginId');
        return redirect('/logAdmin');
      }
      
    }
}
