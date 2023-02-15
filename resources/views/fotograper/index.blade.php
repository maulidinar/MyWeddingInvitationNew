@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Fotograper</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                    class="breadcrumb--active">Album Foto</a> </div>
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
                            List Album foto pernikahan
                        </h2>
                        <a href="" class="ml-auto flex text-theme-1"> <i data-feather="add"
                                class="w-4 h-4 mr-3"></i> Tambah Data</a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        @foreach ($data as $item)
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{URL::to('detail-album/'.$item->id) }}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                            
                                            <div class="ml-auto">
    
                                                <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"
                                                    title="2% Lower than last month"> Lihat Foto<i data-feather="image"
                                                        class="w-4 h-4"></i> </div>

                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $item->jml_album }} Foto</div>
                                        <div class="text-base text-gray-600 mt-1">{{ $item->nama_wanita }} & {{ $item->nama_pria }}</div>
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                        @endforeach

    
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