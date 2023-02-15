@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Laporan Tamu</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">List</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <!-- END: Top Bar -->

        <h2 class="intro-y text-lg font-medium mt-10">
            Laporan data tamu
        </h2>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
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
                            <th>Undangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Ucapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        

                        @foreach($data as $key => $value)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td align="center">
                                <img id="myImg{{ $key }}" onerror="this.onerror=null;this.src='{{ asset('images/noimage.png') }}';" width="70"
                                src="{{ asset('/storage/qrcodes/' . 'QR-'.$value->qr_code.'.png') }}" alt="">
                                {{ $value->qr_code }}
                            </td>
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
                                    {{ $value->nama_pria }} & {{ $value->nama_wanita }}</a>
                            </td>
                            <td class="text-left">
                                <a class="flex items-center items-center">
                                    {{ $value->waktu }}</a>
                            </td>
                            <td class="table-report__action w-auto ">
                                @if ($value->kehadiran != NULL)
                                    <div align='center' class="py-2 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium" style="width: 90px">
                                        <i data-feather="check-circle"></i> Hadir
                                    </div>
                                @else
                                    <div align='center' class="py-2 px-2 rounded-full text-xs bg-theme-6 text-white cursor-pointer font-medium" style="width: 90px">
                                        <i data-feather="check-circle" style="font-size: 10px"></i> Belum Hadir
                                    </div>
                                @endif   
                            </td>
                            <td class="text-left">
                                <a class="flex items-center items-center">
                                    {{ $value->ucapan }}</a>
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