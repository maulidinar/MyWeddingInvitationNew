@extends('layout.frontend')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content" align="center">
       
        <div class="intro-y box py-10 sm:py-20 mt-5" style="border-radius: 20px">
            <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20 w-64">
                <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                    <button class="w-10 h-10 rounded-full button text-white {{ $step_1 ?? 'bg-gray-200' }}">1</button>
                    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">Isi data Customer</div>
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
                    <button class="w-10 h-10 rounded-full button text-white {{ $step_4 ??  'bg-gray-200' }}">
                        <i data-feather="check" class="w-4 h-4 mr-1"></i>
                    </button>
                    <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto ">Selesai</div>
                </div>
                
                <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 absolute mt-5" style="width: 20%"></div>
            </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
                
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-6 xxl:col-span-2">
                            <div class="intro-y flex-1 box py-10 lg:ml-5 mb-5 lg:mb-0">
                                <div class="border-gray-200 border-dashed">
                                    <div class="dz-message" data-dz-message style="margin-top: 1%;margin-bottom: 5%">
                                        <div>
                                            <img src="{{ asset('imgs/done.gif') }}" alt="">
                                        </div>
                                        <div class="text-lg font-medium">SELAMAT!</div>
                                        <div class="text-gray-600"> Pesanan anda berhasil , silahkan tunggu admin untuk konfirmasi dan cek email kamu nanti<br>
                                             <h4 class="font-medium">Stay safe :-)</h4>  </div>

                                    </div>
                                    <a href="{{ route('index') }}">
                                        <button  class="button w-24 justify-center block bg-theme-1 text-white ml-2">OK</button>
                                    </a>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                  

                   
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection