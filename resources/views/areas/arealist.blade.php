@extends('layout.master')
@section('content')

     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Roles</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">List</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <h2 class="intro-y text-lg font-medium mt-10">
            Data List Zone/Area
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Add New Zone/Area
                    </button>
                </a>
               
              
                <div class="hidden md:block mx-auto text-gray-600"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    @if (Session::has('success'))
                    <div id="alert" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9" style="position: absolute;top: -250%">
                         <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                         {{ Session::get('success') }}
                    </div>
                    {{-- <div onload="load_toas({{ Session::get('success') }});"></div> --}}
                     @endif

                    @if (Session::has('error'))
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> 
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="w-56 relative text-gray-700">
                        <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                @if (count($data) > 0)
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">AREA NAME</th>
                            <th class="text-left whitespace-no-wrap">Create</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">{{ $value->area_name }}</a> 
                            </td>
                            <td class="text-left">{{ $value->created_at }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    {{-- <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a> --}}
                                    <a data-id="{{ $value->id }}" class="open-AddBookDialog flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr> 
                        @endforeach
                        
                      
                    </tbody>
                </table>
                {!! $data->links() !!}  
                @else
                <div align="center">
                    <h3>Tidak ada data</h3>
                    <br>
                    <img src="{{ asset('template/src/images/error-illustration.svg') }}" alt="" width="300">
                </div>
                @endif
                
            </div>
                        
         
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                    <div class="text-3xl mt-5">Hapus data Area/Zona</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus data ini ?
                        
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ route('area-destroy') }}" method="POST">   
                        <input type="hidden" name="id" id="val-id" value=""/>
                    @csrf
                    
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- add modal --}}
        
        <div class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Add Zone/Area
                    </h2>
                   
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                            
                        </div>
                    </div>
                </div>
            <form action="area-add" method="POST">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label>Area Name</label>
                        <input name="area_name" type="text" class="input w-full border mt-2" placeholder="Input text">
                    </div>
                    
                <div class="mt-3"></div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                </div>
            </form>
            </div>
        </div>
        
    </div>
    <script>
        $(document).on("click", ".open-AddBookDialog", function () {
        var val_id = $(this).data('id');
        console.log('id',val_id);
        $("#val-id").val( val_id );
        // $('#addBookDialog').modal('show');
        });

        function load_toas(msg){
            $.toast(msg);
        }
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 1500); 
       
    </script>
    <!-- END: Content -->
@endsection