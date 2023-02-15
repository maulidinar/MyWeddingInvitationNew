@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Tamu</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">List</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <!-- END: Top Bar -->

        <h2 class="intro-y text-lg font-medium mt-10">
            Kelola data tamu Perikaahan {{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}
        </h2>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Tambah data tamu
                    </button>
                </a>
                <a href="{{ URL::to('/undangan-masal/'.$undangan->id) }}">
                    <button class="button text-white bg-theme-9 shadow-md mr-2">
                        Kirim undangan masal
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
                        {{-- <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>  --}}
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                @if (count($data) > 0)
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>QR</th>
                            <th>Nama Tamu</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Undangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        

                        @foreach($data as $key => $value)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td><img id="myImg{{ $key }}" onerror="this.onerror=null;this.src='{{ asset('images/noimage.png') }}';" width="70"
                                src="{{ asset('/storage/qrcodes/' . 'QR-'.$value->qr_code.'.png') }}" alt=""></td>
                            <td class="text-left">
                                <a class="flex items-center items-center">
                                    {{ $value->nama_tamu }}</a>
                            </td>
                            <td class="text-left">
                                <a class="flex items-center items-center">
                                    {{ $value->email }}</a>
                            </td>
                            <td class="text-left">
                                <a class="flex items-center items-center">
                                    {{ $value->alamat }}</a>
                            </td>
                            <td class="text-left">
                                @if ($value->status == '0')
                                    <a href="{{ URL::to('/kirim-undangan?tamu_id='.$value->id) }}" style="color: red">
                                        <i data-feather="send" class="w-4 h-4 mr-2"></i>
                                        Kirim Undangan
                                    </a>
                                @else
                                    <a href="{{ URL::to('/kirim-undangan?tamu_id='.$value->id) }}" style="color: green;text-align: center">
                                        <i data-feather="mail" class="w-4 h-4 mr-2"></i>
                                        Kirim Ulang
                                    </a>
                                @endif
                            </td>
                            <td class="table-report__action w-auto ">
                                <div class="open-edit flex items-center mr-3"  style="float: right"> 
                                    <a href="javascript:void(0)" data-id="{{ $value->id }}" onclick="edit({{ $value->id }})">
                                        <i data-feather="edit" class="w-4 h-4 mr-2"></i>
                                    </a>

                                    <a data-id="{{ $value->id }}" class="open-AddBookDialog flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                       <i data-feather="trash" class="w-4 h-4 mr-2"></i>
                                    </a>
                                  <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('generate-qr', $value->qr_code) }}" title="Qr-Code">
                                   <button class="button w-32 mr-2 mb-2 flex items-center justify-center border border-theme-1 text-theme-1">Generate &nbsp;<i
                                            data-feather="grid" class="w-4 h-4 mr-2"></i> </button>
                                </a>
                                    
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

        {{-- MODAL DELETE --}}
        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                    <div class="text-3xl mt-5">Hapus data Tamu</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus data ini.?
                        
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ URL::to('tamu-destroy') }}" method="POST">   
                        <input type="hidden" name="id" id="val-id" value=""/>
                    @csrf
                    
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- MODAL ADD --}}
        <div class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Add Data Tamu
                    </h2>

                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">

                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form  action="{{ URL::to('/tamu-add') }}" method="POST">
                        @csrf
                        <div class="intro-y box p-5">
                            <div>
                                <label>Nama tamu</label>
                                <input name="nama_tamu" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>E-mail</label>
                                <input name="email" type="email" class="input w-full border mt-2" placeholder="Input email here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Alamat</label>
                                <input name="alamat" type="text" class="input w-full border mt-2" placeholder="Input alamat here" required>
                                <input type="hidden" name="undangan_id" value="{{ $undangan->id }}">
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

        {{-- MODAL EDIT --}}
        <div class="modal" id="modal-edit">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Tamu
                    </h2>

                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">

                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form  action="{{ URL::to('/update-tamu') }}" method="POST">
                        @csrf
                        <div class="intro-y box p-5">
                            <div>
                                <label>Nama Tamu</label>
                                <input name="nama_tamu" id="nama_tamu" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                                <input name="id" id="id" type="hidden" class="input w-full border mt-2" placeholder="Input text here" required>
                                <input name="undangan_id" id="undangan_id" type="hidden" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div>
                                <label>Email</label>
                                <input name="email" id="email" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div>
                                <label>Alamat</label>
                                <input name="alamat_tamu" id="alamat_tamu" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                            <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
    <script type="text/javascript">
        $(document).on("click", ".open-AddBookDialog", function () {
            var val_id = $(this).data('id');
            console.log('id',val_id);
            $("#val-id").val( val_id );
        });

        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 1500); 

        function edit(_id)
        {
            $.ajax({
                url: '{{ URL::to('/edit-tamu/') }}/'+_id,
                type: 'GET',
                dataType: 'JSON',
                async: true
            })
            .done(function(e) {
                $("#nama_tamu").val(e.data.nama_tamu);
                $("#alamat_tamu").val(e.data.alamat);
                $("#undangan_id").val(e.data.undangan_id);
                $("#email").val(e.data.email);
                $("#id").val(e.data.id);
                $("#modal-edit").modal('show');
                console.log(e);
            })
            .fail(function() {
                alert('Gagal Ambil Data');
            });
            
        }
    </script>
@endsection