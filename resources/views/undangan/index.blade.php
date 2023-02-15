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
            Data List Undangan
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Add New Undangan
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
                            {{-- <th class="whitespace-no-wrap">ALAMAT</th> --}}
                            <th class="text-left whitespace-no-wrap">TANGGAL PERNIKAHAN</th>
                            {{-- <th class="text-left whitespace-no-wrap">END DATE</th> --}}
                            <th class="text-center whitespace-no-wrap">TEMPLATE</th>
                            <th class="text-center whitespace-no-wrap">NAMA PRIA</th>
                            <th class="text-center whitespace-no-wrap">NAMA WANITA</th>
                            <th class="text-center whitespace-no-wrap">LAT</th>
                            <th class="text-left whitespace-no-wrap">LONG</th>
                            {{-- <th class="text-left whitespace-no-wrap">DOMPET DIGITAL</th> --}}
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr class="intro-x">
                            {{-- <td class="w-40">
                                {{ $value->alamat }}
                            </td> --}}
                          
                            <td class="text-left">{{ \Carbon\Carbon::parse($value->waktu )->format('d-m-Y')}}</td>
                            {{-- <td class="text-left">{{ \Carbon\Carbon::parse($value->show_date_end )->format('d-m-Y')}}</td> --}}
                            <td class="text-center" style="align-items: center">
                                {{-- <img src="{{ asset('uploads/template/'.$value->frame_image) }}" alt="" width="100"> --}}
                                {{ $value->frame_name }}
                            </td>
                            <td class="text-center">{{ $value->nama_pria }}</td>
                            <td class="text-center">{{ $value->nama_wanita }}</td>
                            <td class="text-center" >{{ substr($value->lat,0,10) }}</td>
                            <td class="text-left">{{ substr($value->long,0,10) }}</td>
                            {{-- <td class="text-left" style="color: green;font-weight: bold">{{ $value->dompet_digital }}</td> --}}
                           
                            <td class="table-report__action w-auto">
                                <div class="flex justify-center items-center">
                                   <a href="javascript:void(0)" data-id="{{ $value->id }}" onclick="edit({{ $value->id_u }})">
                                        <i data-feather="edit" class="w-4 h-4 mr-2"></i>
                                    </a>
                                    <a target="blank" class=" open-detail flex items-center mr-3" href="{{ URL::to('/undangan/'.$value->id_u) }}"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> View </a>
                                    {{-- <a target="blank" class=" open-detail flex items-center mr-3" href="{{ URL::to('/undangan_temp/'.$value->id) }}"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> View2</a> --}}
                                    <a data-id="{{ $value->id_u }}" class="open-AddBookDialog flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                   
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
                    <div class="text-3xl mt-5">Hapus Undangan</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus Undangan ini ?
                        
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ route('undangan-destroy') }}" method="POST">   
                        <input type="hidden" name="id" id="val-id" value=""/>
                    @csrf
                    
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- add modal --}}
        
        <div class="modal"  id="header-footer-modal-preview">
            <div class="modal__content" style="width: 800px">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Add Undangan
                    </h2>
                   
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                            
                        </div>
                    </div>
                </div>
                <div class="preview">
            <form  action="{{ URL::to('add-undangan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label style="font-weight: bold">Nama Mempelai</label>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-4">
                                <label>Nama Wanita & Foto</label>
                                <input name="nama_wanita" type="text" class="input w-full border mt-2" placeholder="Nama mempelai" required>
                                <input name="foto_wanita" type="file" class="input w-full border mt-2" placeholder="Foto wanita" required>
                                <input name="ig_wanita" type="text" class="input w-full border mt-2" placeholder="Instagram" required>
                            </div>
                            <div class="col-span-12 sm:col-span-4">
                                <label>Nama Pria & Foto</label>
                                <input name="nama_pria" type="text" class="input w-full border mt-2" placeholder="Nama mempelai" required>
                                <input name="foto_pria" type="file" class="input w-full border mt-2" placeholder="Foto wanita" required>
                                <input name="ig_pria" type="text" class="input w-full border mt-2" placeholder="Instagram" required>
                            </div>
                            <div class="col-span-12 sm:col-span-4">
                                <label>Alamat Undangan</label>
                                <textarea name="alamat" id="" cols="30" rows="7" class="border mt-2"></textarea>

                            </div>
                        </div>
                    
                    </div>

                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-4">
                            <label>Tanggal Pernikahan</label>
                           <input name="tanggal" class="datepicker input w-full border mt-2" type="text">
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <label>Waktu</label>
                            <input  name="waktu" class="input w-full border mt-2" type="time">
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                           <label>Pilih tamplate</label>
                            <select name="template_id" data-placeholder="Select your favorite type" class="select2 w-full" required>
                            @foreach ($template as $item)
                            <option value="{{ $item->id }}">{{ $item->frame_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        
                    </div>
                    
                    <div >
                        <label style="font-weight: bold">Koordinat</label>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-6">
                                <label>Latitude</label>
                                <input name="lat" type="text" class="input w-full border mt-2" placeholder="lat.." required>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label>Longitude</label>
                                <input name="long" type="text" class="input w-full border mt-2" placeholder="long.." required>
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
            <div class="modal__content" style="width: 800px">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Undangan
                    </h2>
        
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal"
                                class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
        
                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form action="{{ URL::to('update-undangan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="intro-y box p-5">
                            <div>
                                <label style="font-weight: bold">Nama Mempelai</label>
                                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                    <div class="col-span-12 sm:col-span-4">
                                        <label>Nama Wanita & Foto</label>
                                        <input name="nama_wanita" id="nama_wanita" type="text" class="input w-full border mt-2" placeholder="Nama mempelai"
                                            required>
                                        <input name="id" id="id" type="hidden" class="input w-full border mt-2" placeholder="Nama mempelai"
                                            required>
                                       
                                        <input name="ig_wanita" id="ig_wanita" type="text" class="input w-full border mt-2" placeholder="Instagram"
                                            required>
                                    </div>
                                    <div class="col-span-12 sm:col-span-4">
                                        <label>Nama Pria & Foto</label>
                                        <input name="nama_pria" id="nama_pria" type="text" class="input w-full border mt-2" placeholder="Nama mempelai"
                                            required>
                                       
                                        <input name="ig_pria" id="ig_pria" type="text" class="input w-full border mt-2" placeholder="Instagram" required>
                                    </div>
                                    <div class="col-span-12 sm:col-span-4">
                                        <label>Alamat Undangan</label>
                                        <textarea name="alamat" id="alamat" id="" cols="30" rows="7" class="border mt-2"></textarea>
                    
                                    </div>
                                </div>
                    
                            </div>
                    
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <div class="col-span-12 sm:col-span-4">
                                    <label>Tanggal Pernikahan</label>
                                    <input name="tanggal" id="tanggal" class="datepicker input w-full border mt-2" type="text">
                                </div>
                               
                                <div class="col-span-12 sm:col-span-4">
                                    <label>EDIT tamplate</label>
                                    <select name="template_id" data-placeholder="Select your favorite type" class="select2 w-full" required>
                                        @foreach ($template as $item)
                                        <option value="{{ $item->id }}">{{ $item->frame_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                    
                            </div>
                    
                            <div>
                                <label style="font-weight: bold">Koordinat</label>
                                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                    <div class="col-span-12 sm:col-span-6">
                                        <label>Latitude</label>
                                        <input name="lat" id="lat" type="text" class="input w-full border mt-2" placeholder="lat.." required>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        <label>Longitude</label>
                                        <input name="long" id="long" type="text" class="input w-full border mt-2" placeholder="long.." required>
                                    </div>
                    
                                </div>
                    
                                <div class="mt-3"></div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                                <button type="submit" class="button w-20 bg-theme-1 text-white">UPDATE</button>
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
                url: '{{ URL::to('/edit-undangan/') }}/'+_id,
                type: 'GET',
                dataType: 'JSON',
                async: true
            })
            .done(function(e) {
                $("#nama_wanita").val(e.data.nama_wanita);
                $("#ig_wanita").val(e.data.ig_wanita);
                $("#nama_pria").val(e.data.nama_pria);
                $("#ig_pria").val(e.data.ig_pria);
                $("#lat").val(e.data.lat);
                $("#long").val(e.data.long);
                $("#id").val(e.data.id);
                $("#tanggal").val(e.data.tanggal);
                $("#alamat").val(e.data.alamat);
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