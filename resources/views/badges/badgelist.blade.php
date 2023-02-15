@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Badge</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">list</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            Data List Laporan
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                {{-- <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Add New Badge
                    </button>
                </a> --}}
               
              
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
                            <th class="whitespace-no-wrap">FOTO</th>
                            <th class="text-left whitespace-no-wrap">BADGE NAME</th>
                            <th class="text-left whitespace-no-wrap">ROLE</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <a data-id="{{ $value->id }}" class="open-detail" href="javascript:;" data-toggle="modal" data-target="#modal-detail"> 
                                    <div class="w-10 h-10 image-fit zoom-in">
                                    
                                        <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('uploads/badge/'.$value->image) }}" title="{{ $value->badge_name }}">
                                    
                                    </div>
                                </a>
                                </div>
                            </td>
                          
                            <td class="text-left">{{ $value->badge_name }}</td>
                            <td class="text-left">{{ $value->roles_name }}</td>
                           
                            <td class="table-report__action w-auto">
                                <div class="flex justify-center items-center">
                                    <a href="{!! route('badge-print', ['id'=>$value->id])!!}" class="flex items-center mr-3"> <i data-feather="printer" class="w-4 h-4 mr-1"></i> Preview Badge </a>
                                    <a data-id="{{ $value->id }}" class=" open-detail flex items-center mr-3"href="javascript:;" data-toggle="modal" data-target="#modal-detail"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Detail </a>
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
                    <div class="text-3xl mt-5">Hapus data Badge</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus Badge ini ?
                        
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ route('badge-destroy') }}" method="POST">   
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
                        Add Badge
                    </h2>
                   
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                            
                        </div>
                    </div>
                </div>
                <div class="preview">
            <form data-single="true"  action="badge-store" method="POST" enctype="multipart/form-data">
                @csrf
                 
                {{-- <div class="fallback">
                    <input name="upload_file" type="file" />
                    </div>
                    <div class="dz-message" data-dz-message>
                        <div class="text-lg font-medium">Klik Disini untuk upload Gambar.</div>
                        <div class="text-gray-600"> Pastikan gambar yang di upload sudah sesuai kriteria. </div>
                    </div> --}}

                <div class="intro-y box p-5">
                    <div>
                        <label>Badge Name</label>
                        <input name="badge_name" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                    </div>
                    <br>
                    <div>
                        <label>Upload file</label><br>
                        <input name="upload_file" type="file" required/>    
                    </div>
                    <br>
                    
                    
                    <div class="mt-3">
                        <label>Pilih Role</label>
                        <div class="mt-2">
                            <select name="role" data-placeholder="Select Roles" class="select2 w-full" required>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->roles_name }}</option>
                                @endforeach
                            </select>    
                        </div>
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
        {{-- modal detail --}}
        <div class="modal" id="modal-detail">
            <div class="modal__content" style="width: 35%">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Detail
                    </h2>
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        </div>
                    </div>
                </div>
                
                    
                  
                    <div class="px-5">
                        <div class="flex flex-col lg:flex-row items-center pb-5">
                            <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                <div class="w-24 h-24 image-fit" id="image">   
                                </div>
                                <div class="sm:mr-5">
                                    
                                </div>
                                <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                    <a href="" class="font-medium text-lg name"></a> 
                                    <div class="text-gray-600 mt-1 sm:mt-0" id="role"> </div>
                                </div>
                            </div>
                            <div class="font-semibold text-theme-1 text-lg" style="margin-left: 5%">Zone &nbsp;: </div>
                            <div id="zones" class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 items-center justify-center px-5 border-t lg:border-t-0 border-gray-200">
                                
                                
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                            <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                
                                
                            </div>
                           
                        </div>
                    </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal" class="button w-20 border bg-theme-12 text-gray-700 mr-1">OK</button>
            
                    <button  onclick="go_detail()" class="button w-32 bg-theme-1  border text-white mr-1"> 
                        {{-- <i data-feather="printer" class="w-4 h-4 mr-2"></i>  --}}
                        Print Preview
                    </button>
                    
                </div>
            
                
            </div>
        </div>
        
    </div>
    <!-- END: Content -->
    <script>
        $(document).on("click", ".open-AddBookDialog", function () {
        var val_id = $(this).data('id');
        console.log('id',val_id);
        $("#val-id").val( val_id );
        // $('#addBookDialog').modal('show');
        });
        // details
        let detail_id;
        $(document).on("click", ".open-detail", function () {
        var val_id = $(this).data('id');
        console.log('id-detail',val_id);
        detail_id = val_id;
        $.ajax({ 
            type: 'GET', 
            url: 'badge-detail', 
            data: { id: val_id }, 
            dataType: 'json',
            success: function (resp) { 
                console.log('res',resp);
                let name = resp.data[0].badge_name;
                let role = 'Role :' + resp.data[0].roles_name;
                let image_data = 'uploads/badge/'+resp.data[0].image;
                let ar_zone = resp.zone;
                document.querySelector('.name').innerHTML = name;
                document.getElementById('role').innerHTML = role
                var zones = "";
                var img = '<img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="'+image_data+'">'
                for (let index = 0; index < ar_zone.length; index++) {
                        const element = ar_zone[index];
                        zones += '<div class="text-center rounded-md w-50 py-3" ><div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">'+element.area_name+'</div></div>'
                }   
                document.getElementById("zones").innerHTML = zones;
                document.getElementById("image").innerHTML = img;
            }
        });
        });

        function go_detail(){
            console.log(detail_id);
            window.location = 'badge-print?id='+detail_id;
        }

        function load_toas(msg){
            $.toast(msg);
        }
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 2500); 
       
    </script>
@endsection