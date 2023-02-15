@extends('layout.master')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Models</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">List</a> </div>
            <!-- END: Breadcrumb -->
            @include('layout.topnav')
           @include('layout.notification')
           
        </div>
        <!-- END: Top Bar -->

        <h2 class="intro-y text-lg font-medium mt-10">
            Data Model - {{ $agency->agency_name }}
        </h2>

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                
                <a href="{{ url('model-list') }}" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-9 shadow-md mr-2">
                        List Agency
                    </button>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">
                        Add New Model
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
                            <th class="whitespace-no-wrap">MODEL NAME</th>
                            <th class="whitespace-no-wrap">AGENCY</th>
                            <th class="whitespace-no-wrap">AGE</th>
                            <th class="whitespace-no-wrap">HEIGHT</th>
                            <th class="whitespace-no-wrap">WEIGHT</th>
                            <th class="whitespace-no-wrap">KOTA</th>
                            <th class="whitespace-no-wrap">PICTURE</th>
                            <th class="whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $value)
                        <tr>
                            <td class="text-left">{{ $value->model_name }}</td>
                            <td class="text-left">{{ $value->agency_name }}</td>
                            <td class="text-left">{{ $value->age }} thn</td>
                            <td class="text-left">{{ $value->height }} cm</td>
                            <td class="text-left">{{ $value->weight }} kg</td>
                            <td class="text-left">{{ $value->city }}</td>
                   
                            <td class="text-left">
                                <img src="{{ asset('/uploads/model/closeup/'.$value->picture_closeup) }}" style="width:100px;">
                            </td>

                            <td class="table-report__action w-auto">
                                <a data-id="{{ $value->id }}" class="open-edit flex items-center mr-3" href="javascript:;" onclick="edit({{ $value->id }})"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a data-id="{{ $value->id }}" class="open-AddBookDialog flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
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
                    <div class="text-3xl mt-5">Hapus data Model</div>
                    <div class="text-gray-600 mt-2">Anda yakin ingin menghapus Model ini.?
                        
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{ URL::to('delete-model/'.$agency->id) }}" method="POST">   
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
                        Add Agency
                    </h2>

                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">

                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form  action="{{ URL::to('/add-new-model/'.$agency->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="intro-y box p-5">
                            <div>
                                <label>Name</label>
                                <input name="model_name" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Age</label>
                                <input name="age" type="number" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Height</label>
                                <input name="height" type="number" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Weight</label>
                                <input name="weight" type="number" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Origin</label>
                                <input name="origin" type="text" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                            <div>
                                <label>Picture</label>
                                <input name="picture" type="file" class="input w-full border mt-2" placeholder="Input text here" required>
                            </div>
                            <div class="mt-3"></div>
                        </div> --}}
                        <div class="intro-y box p-5">
                            <div>
                                <label>Full Name</label>
                                <input name="model_name" type="text" class="input w-full border mt-2" placeholder="Fullname here" required>
                            </div>
                            <br>
                            <div class="grid grid-cols-12 gap-1"> 
                                <div  class="input w-full border col-span-6">
                                    <label>Upload Picture Full Body</label><br>
                                <input name="picture_full" type="file" required/> 
                                </div>
                                <div  class="input w-full border col-span-6">
                                    <label>Upload Picture Closeup</label><br>
                                <input name="picture_closeup" type="file" required/> 
                                </div>
                            </div> 
                            <br>
                            <div class="grid grid-cols-12 gap-2"> 
                                <input type="number" name="age" class="input w-full border col-span-4" placeholder="Age"> 
                                <input type="number" name="height" class="input w-full border col-span-4" placeholder="Height">
                                <input type="number" name="weight" class="input w-full border col-span-4" placeholder="Weight"> 
                            </div> 
                            <br>
                            <div>
                                <label>City</label>
                                <input name="city" type="text" class="input w-full border mt-2" placeholder="City" required>
                            </div>
                            <div>
                                <label>Email</label>
                                <input name="email" type="text" class="input w-full border mt-2" placeholder="email@mail.com" required>
                            </div>
                            <br>
                            <div class="grid grid-cols-12 gap-1"> 
                                <div  class="input w-full border col-span-6">
                                    <label>Upload KITAS/KTP</label><br>
                                <input name="ktp" type="file" required/> 
                                </div>
                               
                            </div> 
                            <div>
                                <label>Online Audition</label>
                                <input name="online_audition" type="date" class="input w-full border mt-2"  required>
                            </div>
                            <div>
                                <label>Experience (optional)</label>
                                <input name="experience" type="text" class="input w-full border mt-2">
                            </div>
                
                        <div class="mt-3"></div>
                        </div>
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
                        Edit Model
                    </h2>

                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">

                        </div>
                    </div>
                </div>
                <div class="preview">
                    <form  action="{{ URL::to('/update-new-model/'.$agency->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" id="id" type="hidden" class="input w-full border mt-2" placeholder="Input text here" required>
                        <div class="intro-y box p-5">
                            <div>
                                <label>Full Name</label>
                                <input name="model_name" id="model_name" type="text" class="input w-full border mt-2" placeholder="Fullname here" required>
                            </div>
                            <br>
                            <div class="grid grid-cols-12 gap-1"> 
                                <div  class="input w-full border col-span-6">
                                    <label>Upload Picture Full Body</label><br>
                                <input name="picture_full" type="file" /> 
                                </div>
                                <div  class="input w-full border col-span-6">
                                    <label>Upload Picture Closeup</label><br>
                                <input name="picture_closeup" type="file" /> 
                                </div>
                            </div> 
                            <div class="grid grid-cols-12 gap-2"> 
                                <input type="number" id="age" name="age" class="input w-full border col-span-4" placeholder="Age"> 
                                <input type="number" id="height" name="height" class="input w-full border col-span-4" placeholder="Height">
                                <input type="number" id="weight" name="weight" class="input w-full border col-span-4" placeholder="Weight"> 
                            </div> 
                            <div>
                                <label>City</label>
                                <input name="city" id="city" type="text" class="input w-full border mt-2" placeholder="City" required>
                            </div>
                            <div>
                                <label>Email</label>
                                <input name="email" id="email" type="text" class="input w-full border mt-2" placeholder="email@mail.com" required>
                            </div>
                            <br>
                            <div class="grid grid-cols-12 gap-1"> 
                                <div  class="input w-full border col-span-6">
                                    <label>Upload KITAS/KTP</label><br>
                                <input name="ktp" type="file" required/> 
                                </div>
                               
                            </div> 
                            <div>
                                <label>Online Audition</label>
                                <input name="online_audition" id="online_audition" type="date" class="input w-full border mt-2"  required>
                            </div>
                            <div>
                                <label>Experience (optional)</label>
                                <input name="experience" id="experience" type="text" class="input w-full border mt-2">
                            </div>
                            <div class="mt-3"></div>
                        </div>
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
                url: '{{ URL::to('/edit-model/') }}/'+_id,
                type: 'GET',
                dataType: 'JSON',
                async: true
            })
            .done(function(e) {
                $("#id").val(e.data.id);
                $("#model_name").val(e.data.model_name);
                $("#age").val(e.data.age);
                $("#height").val(e.data.height);
                $("#weight").val(e.data.weight);
                $("#city").val(e.data.city);
                $("#email").val(e.data.email);
                $("#online_audition").val(e.data.online_audition);
                $("#experience").val(e.data.experience);
                $("#origin").val(e.data.origin);
                $("#modal-edit").modal('show');
                console.log(e);
            })
            .fail(function() {
                alert('Gagal Ambil Data');
            });
            
        }
    </script>
@endsection