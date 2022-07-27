<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

   
    public function user()
    {
        $id = Auth::user()->id;
        $data = DB::table('orders')->where('user_id', $id)
    ->join('products', 'orders.product_price', '=', 'products.product_price',)
    ->select('orders.product_price','orders.quantity','orders.bill_id','products.product_name','orders.created_at')
    ->get(); 
        return view('layouts.user', compact('data'));
        
    }

    public function editPic(Request $request){
        $id = Auth::user()->id;
         $data = User::find($id);
         $file= $request->file('img');
         $filename=$file->getClientOriginalName();
         $file-> move(public_path('img'), $filename);
         $file_store= $filename;
         $data-> img =$file_store; /// cloum name
         $data->update();
         return redirect('user');
       }
    
       public function updateuser(Request $request)
       {
         $id = Auth::user()->id;
         
         
         $name=$request->input('name');
         $phone=$request->input('phone');
         $email=$request->input('email');
        
         DB::update('update users set name = ? ,phone=?, email=? where id = ?', [$name,$phone,$email,$id]);
         return redirect('/user')->with('message','The data has been updated successfully');
       
       }

       public function logAdmin(){
        return view('admin.loginAdmain');
      }

      public function LoginAdmin(){
        $email= request('adminEmail');
        $pass= request('adminPass');
        // $pass=Hash::make($pass);
        $users = DB::select('select * from users');
        foreach ($users as $user) {
            if($user->email == $email){
                if(($user->password == $pass) && ($user->is_admin == 1)){
                    return redirect('/crud')->with('id',$user->id);
                }else{
                    if($users[count($users)-1]->id == $user->id){
                    return redirect('/logAdmin')->with('message','Email or password is wrong');
                    }else{
                        continue;
                    }
                }
            }else{
                if($users[count($users)-1]->id == $user->id){
                    return redirect('/logAdmin')->with('message','Email or password is wrong');
                }else{
                    continue;
                }
            }
        }
    }
}
