@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Ticket</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">list</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
        </div>
        <h2 class="intro-y text-lg font-medium mt-10">
            Data List Template Undangan
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Add New Template
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
                            <th class="whitespace-no-wrap">FRAME NAME</th>
                            <th class="text-left whitespace-no-wrap">FRAME TEMPLATE</th>
                            <th class="text-center whitespace-no-wrap">CREATED</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr class="intro-x">
                            <td class="w-50">
                                {{ $value->frame_name }}
                            </td>
                            <td class="text-center" style="align-items: center">
                                <img src="{{ asset('uploads/template/'.$value->frame_image) }}" alt="" width="100">
                            </td>
                            <td class="text-left">{{ \Carbon\Carbon::parse($value->created_at )->format('d-m-Y')}}</td>
                            {{-- <td class="text-left">{{ \Carbon\Carbon::parse($value->show_date_end )->format('d-m-Y')}}</td> --}}
                        
                            <td class="table-report__action w-auto">
                                <div class="flex justify-center items-center">
                                   <a href="javascript:void(0)" data-id="{{ $value->id }}" onclick="edit({{ $value->id }})">
                                    <i data-feather="edit" class="w-4 h-4 mr-2"></i>
                                </a>
                                    {{-- <a data-id="{{ $value->id }}" class=" open-detail flex items-center mr-3"href="javascript:;" data-toggle="modal" data-target="#modal-detail"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Detail </a> --}}
                                    <a data-id="{{ $value->id }}" class="open-AddBookDialog flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $data->links() !!}   --}}
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
                    <div class="text-3xl mt-5">Hapus Data</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus Data template ini ?</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ route('template-destroy') }}" method="POST">   
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
                        Add Undangan Template
                    </h2>
                   
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                            
                        </div>
                    </div>
                </div>
                <div class="preview">
            <form  action="{{ URL::to('add-template') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12">
                            <label>Nama template</label>
                            <input  name="frame_name" class="input w-full border mt-2" type="text">
                        </div>
                        <div class="col-span-12">
                            <label>Warna Tema template</label>
                            <label for="exampleColorInput" class="form-label">Color picker</label>
                            <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c"
                                title="Choose your color">
                        </div>
                        <div class="col-span-12">
                            <div class="dz-message" data-dz-message style="margin-top: 10%">
                                <div class="text-lg font-medium">Silahkan upload Cover Image file template.</div>
                                <div class="text-gray-600"> Gambar harus berformat JPG, PNG atau JPEG </div>
                                <br>
                                <input name="frame_image" type="file" required />
                            </div>
                            {{-- <div class="dz-message" data-dz-message style="margin-top: 10%">
                                <div class="text-lg font-medium">Upload Audio background.</div>
                                <div class="text-gray-600"> Gambar Harus berformat MP3 </div>
                                <br>
                                <input name="audio" type="file" required />
                            </div> --}}
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

        <div class="modal" id="modal-edit">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Tamu
                    </h2>
        
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal"
                                class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
        
                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form action="{{ URL::to('/update-template') }}" method="POST">
                        @csrf
                        <div class="intro-y box p-5">
                            <div>
                                <label>Nama Template</label>
                                <input name="frame_name" id="frame_name" type="text" class="input w-full border mt-2"
                                    placeholder="Input text here" required>
                                <input name="id" id="id" type="hidden" class="input w-full border mt-2"
                                    placeholder="Input text here" required>
                                
                            </div>
                            <div>
                                <label>Image</label>
                                <input name="frame_image" type="file" class="input w-full border mt-2"
                                    placeholder="Input text here" required>
                            </div>
                            <div>
                                <label>Warna</label>
                                <input name="color" id="color" type="text" class="input w-full border mt-2"
                                    placeholder="Input text here" required>
                            </div>
                            <div>
                                <label>Audio</label>
                                <input name="audio" type="file" class="input w-full border mt-2"
                                    placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" data-dismiss="modal"
                                class="button w-20 border text-gray-700 mr-1">Cancel</button>
                            <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <script>
         function edit(_id)
        {
            $.ajax({
                url: '{{ URL::to('/edit-template/') }}/'+_id,
                type: 'GET',
                dataType: 'JSON',
                async: true
            })
            .done(function(e) {
                $("#frame_name").val(e.data.frame_name);
                $("#frame_image").val(e.data.frame_image);
                // $("#audio").val(e.data.audio);
                // $("#color").val(e.data.color);
                // $("#id").val(e.data.id);
                $("#modal-edit").modal('show');
                console.log(e);
            })
            .fail(function() {
                alert('Gagal Ambil Data');
            });
            
        }
         $(document).on("click", ".open-AddBookDialog", function () {
        var val_id = $(this).data('id');
        console.log('id',val_id);
        $("#val-id").val( val_id );
        // $('#addBookDialog').modal('show');
        });

        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 1500); 

       
    </script>
    <!-- END: Content -->
@endsection