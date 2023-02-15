@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
        </div>
        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                       
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{URL::to('undangan-list') }}">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> 
                                        <div class="ml-auto">
                                            
                                                <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> Detail<i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                                            
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $undangan }}</div>
                                    <div class="text-base text-gray-600 mt-1">Jumlah Undangan</div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{ URL::to('tamu-list') }}">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="tag" class="report-box__icon text-theme-3"></i> 
                                        <div class="ml-auto">
                                            {{-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div> --}}
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $tamu }}</div>
                                    <div class="text-base text-gray-600 mt-1">Jumlah Tamu</div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{ route('undangan-list') }}">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="tag" class="report-box__icon text-theme-6"></i> 
                                        <div class="ml-auto">
                                            {{-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div> --}}
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $pub_ticket }}</div>
                                    <div class="text-base text-gray-600 mt-1">Jumlah Tamu Datang</div>
                                </div>
                            </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- END: General Report -->
                
            </div>
            <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                 
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection