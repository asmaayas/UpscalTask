@extends('layouts.app')
@section('title', 'User Page')
@section('content')
@section('style')
<style>
  .no_active
  {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    height: 300px;
    width: 100%;
   text-align: center;
  }
  .no_active .btn
  {
    
    display: inline;
    /* margin-left: 35%; */
  }
  .text_no_active
  {
    font-size: 3rem;
    color: black;
    margin: 5%;

  }
  .active_vol_header
  {
    text-align: center;
    font-weight: bold;
  }

  #editPic{
    display: none;
}
.cont{
    width: 60%;
}
.butt{
    background-color: rgb(245, 245, 220,0);
    border: none;
}
#use{
    display: none;
}
  </style>
  @endsection



<div class="container ">
    <div class="main-body">
    
        
    
         
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{asset('/storage/img/'.Auth::user()->img) }}" alt="Admin" class="rounded-circle" height="150" width="150">
                <!-- <a href="/addItem"> edit</a> -->
                
                <div class="mt-3">
                  <h4>{{  Auth::user()->name}}</h4>
                  <div class="row d-flx">
                  <form action="/added" method="post" enctype="multipart/form-data" id="editPic">
                        @csrf
                        <input type="file" name="img" required style="font-size:small;">
                        <input type="submit" name="addItem" value="edit" style="font-size:small;">
                  </form>
                  </div>
                  <button type="subimt" onclick="show()" class="butt"><i class="fa-solid fa-pen-to-square" id ="ed"></i></button>
                 
                  <a href=""></a>
                  
                </div>
              </div>
            </div>
          </div>
        
          <div class="card mt-3" id="use1">
            <ul class="list-group list-group-flush mt-2">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap ">
                <h6 class="mb-0">Full Name</h6>
                <span class="text-secondary"><span class="text-secondary">{{  Auth::user()->name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0">Email</h6>
                <span class="text-secondary">{{  Auth::user()->email}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0">Phone</h6>
                <span class="text-secondary">{{  Auth::user()->phone}}</span>
              </li>
              </li>
              
              </li>
           
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn " onclick="show1()" style="background-color: #008E89; color:white;" >Edit</button>
                </div>
              </li>
            </ul>
          </div>
          <!--  -->
          <form  method="post" action="{{url('/updateuser')}}" id='use'>
            @csrf
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">First Name</h6>
                <input type="text" name="name" value="{{  Auth::user()->name}}" class="@error('name') is-invalid @enderror">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0">Email</h6>
              <input type="text" name="email" value="{{  Auth::user()->email}}" class="@error('name') is-invalid @enderror">
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0">Phone</h6>
              <input type="text" name="phone" value="{{  Auth::user()->phone}}" class="@error('name') is-invalid @enderror">
              @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <div class="row">
                <div class="col-sm-12">
                 
                  <button class="btn " type="submit" style="background-color: #008E89; color:white;" > edit</button>
                </div>
              </li>
            </ul>
          </div>
          </form>
        </div>
             
              <div class="col-md-8">
              <div class="card ">
                
                <div class="card-body no_active">
                  <h5 class="card-title text_no_active">Your Previous Order</h5>
                  <ul class="list-group list-group-flush mt-2">
          
              
             @foreach($data as $i)
             <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0">{{$i->created_at}}</h6>
                <span class="text-secondary">{{$i->bill_id}}</span>
                <span class="text-secondary">{{$i->product_name}}</span>
                <span class="text-secondary">{{$i->product_price}}</span>
                <span class="text-secondary">{{$i->quantity}}</span>
              </li>
                  

                  @endforeach
           
            </ul>
                  

                </div>
              </div>


          
          


              <!-- <a class="btn  " target="__blank" href="show_request">Look for an opportunity </a> -->
          
           
            
           
         



             
              



            </div>
          </div>

        </div>
    </div>

    <script>
      function show(){
        document.getElementById('editPic').style.display="block";
        document.getElementById('ed').style.display="none";
      }
      function show1(){
        document.getElementById('use').style.display="block";
        document.getElementById('use1').style.display="none";
      }
    </script>
    @endsection