<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    //
    public function prod()
    {
        $data=Product::all(); 
        return view('welcome', compact('data'));
    }


    public function update($id)
    {
      $i=Product::find($id);
        return view('admin.update',compact('i'));
    }
    
    public function crud(){
      
        $data=Product::all();
        return view('admin.crud',compact('data'));
    }

    public function createPro(Request $request){

      $request->validate([
        'product_name'=> 'required',
        'product_price'=> 'required|numeric',
        'product_details'=> 'required',
        'product_quality'=> 'required',
        'product_img'=> 'required|mimes:jpg,png,jpeg|max:5048',
       ]);


        $create=new Product();
        $create->product_name=$request->input('product_name');
        $create->product_price=$request->input('product_price');
        $create->product_details=$request->input('product_details');
        $create->product_quality=$request->input('product_quality');
        $FileName =  time().'-'.$request->product_name . '.'.$request->product_img->extension();
        $file= $request->product_img->storeAs('img', $FileName , 'public');
       
         $create-> product_img =$FileName; /// cloum name
        
        
        
        $create->save();
        return redirect('/crud')->with('message','The data has been added successfully');
      }

      public function deletePro($id){
        $del=Product::find($id);
        $del->delete();
        return redirect('/crud');
    
    }

    public function updatePro(Request $request, $id)
    {
      $request->validate([
        'product_name'=> 'required',
        'product_price'=> 'required|numeric',
        'product_details'=> 'required',
        'product_quality'=> 'required',
        'product_img'=> 'required|mimes:jpg,png,jpeg|max:5048',
       ]);
       $update = Product::find($id); 
       $update->product_name=$request->input('product_name');
       $update->product_price=$request->input('product_price');
       $update->product_details=$request->input('product_details');
       $update->product_quality=$request->input('product_quality');
       $FileName =  time().'-'.$request->product_name . '.'.$request->product_img->extension();
       $file= $request->product_img->storeAs('img', $FileName , 'public');
     
         $update-> product_img =$FileName; /// cloum name
       $update->update();
       return redirect('/crud')->with('message1','The data has been updated successfully');
    }
}
