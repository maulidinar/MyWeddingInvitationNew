@extends('layout.frontend')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content" align="center">
        <a href="{{ route('index') }}"><button style="margin-top: 2%;">
            <i data-feather="home"  ></i>
            
            </button>
        </a>
        <div class="intro-y box py-10 sm:py-20 mt-5" style="border-radius: 20px">
            <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20 w-64">
                <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                    <button class="w-10 h-10 rounded-full button text-white {{ $step_1 ?? 'bg-gray-200' }}">1</button>
                    <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Isi data Customer</div>
                </div>
                
                <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                    <button class="w-10 h-10 rounded-full button text-gray-600 {{ $step_2 ?? 'bg-gray-200' }}">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Pembayaran</div>
                </div>
                {{-- <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                    <button class="w-10 h-10 rounded-full button text-gray-600 {{ $step_3 ?? 'bg-gray-200' }}">2</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Verifikasi</div>
                </div> --}}
                <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                    <button class="w-10 h-10 rounded-full button text-gray-600 {{ $step_4 ??  'bg-gray-200' }}">
                        <i data-feather="check" class="w-4 h-4 mr-1"></i>
                    </button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Selesai</div>
                </div>
                
                <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 absolute mt-5" style="width: 20%"></div>
            </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
                
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-6 xxl:col-span-2">
                            <div class="intro-y flex-1 box py-10 lg:ml-5 mb-5 lg:mb-0">
                                @if ($data->type == 'REG')
                                <img src="{{  asset('badge/reg.png') }}" alt=""  class="w-14 h-16 text-theme-1 mx-auto">
                                <h2>Reguler</h2>    
                                @endif
                                @if ($data->type == 'GOLD')
                                <img src="{{  asset('badge/gold.png') }}" alt=""  class="w-14 h-16 text-theme-1 mx-auto">
                                <h2>Gold</h2>    
                                @endif
                                @if ($data->type == 'PREM')
                                <img src="{{  asset('badge/prem.png') }}" alt=""  class="w-14 h-16 text-theme-1 mx-auto">
                                <h2>Premium</h2>    
                                @endif
                                

                                <div class="text-xl font-medium text-center mt-10">{{ $data->show }}</div>
                                <div class="text-gray-600 px-10 text-center mx-auto mt-2">Mulai tgl : {{ \Carbon\Carbon::parse($data->show_date_start )->format('d-m-Y')}} s/d Tgl :
                                    {{ \Carbon\Carbon::parse($data->show_date_end )->format('d-m-Y')}}
                                </div>
                                <div class="flex justify-center">
                                    <div class="relative text-2xl font-semibold mt-8 mx-auto">Quota <span>{{ $data->quota }}</span></div><br>
                                    

                                </div>
                                <h4 style="font-weight: bold;color: red">Sisa Tiket {{ $data->sisa }}</h4>
                                {{-- <a href="{{ route('user-data',['t_id'=>'1']) }}">
                                    <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8">PURCHASE NOW</button>
                                </a> --}}
                                
                            </div>
                        </div>
                    </div>
                    {{-- step 1 --}}
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <form action="user-save" method="POST">
                            @csrf
                        <div class="font-medium text-base">Silahkan isi data untuk booking tiket</div>
                        <br>
                        <div class="mb-2 text-left">Nama Lengkap</div>
                        <input type="text" name="fullname" class="input w-full border flex-1" placeholder="Full Name" required>
                        <div style="margin-bottom: 20px"></div>
                        <div class="mb-2 text-left">Email</div>
                        <input name="email" type="email" class="input w-full border flex-1" placeholder="mail@mail.com" required>
                        <div style="margin-bottom: 20px"></div>
                        <div  class="mb-2 text-left">No HP</div>
                        <input name="phone" type="text" class="input w-full border flex-1" placeholder="+62 xxxx" required>
                        <div style="margin-bottom: 20px"></div>
                        {{-- <div class="mb-2 text-left">Nama Event</div> --}}
                        <input name="ticket_id" type="hidden" value="{{ $data->id }}"  class="input w-full border flex-1">
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                           
                            <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Next</button>
                        </div>
                    </form>
                    
                    </div>

                   
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection