@extends('front_end.template.layout')
@section('header')
   <style>
       header, footer, .border-bottom{
           display: none !important;
       }
       body{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
       }
       .btn{
            background: #000;
            color: #fff;
            border-radius: 50rem;
            padding: 10px 24px;
            height: auto;
       }
       .btn-style-02:before{
           border-radius: 50rem;
       }
   </style>
@stop

@section('content')
<div class="">
   <div class="container">
     <div class="row justify-content-center align-items-center">
       <div class="col-12 text-center">
           <img src="{{ asset('') }}front_end/image/verified.gif" class="img-fluid mb-4">
           <h4>Email Verified Successfully!</h4>
           <br><span>Please note that your account will be fully activated after it has been approved by our administrators. We will notify you via email once this approval process is completed</span>
           <div class="mt-5 d-flex align-items-center flex-wrap justify-content-center" style="gap: 20px;">
               <a class="btn log-in-btn btn-style-02 focus-reset" style="background: #ffe61d; color: #000" href="{{url('/vendor')}}">
               Login
                </a>
                @if(Route::current()->getName() != 'register-v')
                <a class="btn btn-style-02 focus-reset" href="{{url('/register')}}">
                   Become a Vendor
                </a>
                @endif
           </div>
       </div>
     </div>
   </div>
 </div>

@stop

@section('script')
@stop