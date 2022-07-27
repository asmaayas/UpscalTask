<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function prod()
    {
        $data=Product::all(); 
        return view('welcome', compact('data'));
    }

    public function crud(){
        $data=Product::all();
        return view('admin.crud',compact('data'));
    }

    public function createPro(Request $request){
        $create=new Product();
        $create->product_name=$request->input('product_name');
        $create->product_price=$request->input('product_price');
        $create->product_details=$request->input('product_details');
        $create->product_quality=$request->input('product_quality');
        // $create->product_img=$request->file('product_img');
        $file= $request->file('product_img');
         $filename=$file->getClientOriginalName();
         $file-> move(public_path('img'), $filename);
         $file_store= $filename;
         $create-> product_img =$file_store; /// cloum name
        
        
        
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
       $update = Product::find($id); 
       $update->product_name=$request->input('product_name');
       $update->product_price=$request->input('product_price');
       $update->product_details=$request->input('product_details');
       $update->product_quality=$request->input('product_quality');
       $file= $request->file('product_img');
         $filename=$file->getClientOriginalName();
         $file-> move(public_path('img'), $filename);
         $file_store= $filename;
         $update-> product_img =$file_store; /// cloum name
       $update->update();
       return redirect('/crud');
    }
}
