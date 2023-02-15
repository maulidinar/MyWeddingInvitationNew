@extends('layout.master')
@section('content')

     <!-- BEGIN: Content -->
     <div class="content" align="center">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
                <a href="" class="">Badge</a> 
                <i data-feather="chevron-right" class="breadcrumb__icon"></i>
                 <a href="{{ route('badge') }}" class="breadcrumb--active">list</a> 
                <i data-feather="chevron-right" class="breadcrumb__icon"></i>
                 <a href="" class="breadcrumb--active">Preview</a> 
            </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <!-- END: Top Bar -->
        
           <a href="{!! route('badge-print-act', ['id'=>$data->id])!!}" >
            <button  class="button w-24 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> 
                <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print 
            </button>
            </a> 
        
        
        

        <div class="container" id="printableArea">
            <link rel="stylesheet" href="{{ asset('badge/IDCard.css') }} ">
            <div class="padding" >
                
               
            <div class="font" >
                {{-- <div class="companyname">1 Mei<br><span class="tab">Hotel Mulya</span></div> --}}
                <div  align="center">
                    <div class="top">
                        <img src="{{ asset('uploads/badge/'.$data->image) }}" alt="">
                    </div>
                    
                        <div class="ename">
                        <p class="p1"><b>{{ $data->badge_name }}</b></p>
                        <p>{{ $data->roles_name }}</p>
                        </div>
                        <div class="barcode">
                            {!!QrCode::size(130)->generate($data->badge_code); !!}
                          <div style="text-align: center">
                            <h6>{{ $data->badge_code }}</h6>
                          </div>
                        </div>
                        <div class="edetails">
                        </div>
                </div>
                
                
            </div>
        </div>
           
        </div>
        
    </div>
    <!-- END: Content -->
    <script>
        function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     setTimeout(() => {
        window.print();
        document.body.innerHTML = originalContents;
     }, 500);
     
     
}
    </script>
@endsection