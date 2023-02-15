@extends('layout.frontend')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content" align="center">
        <div class="intro-y box py-10 sm:py-20" style="border-radius: 20px">
            <div class="px-5 sm:px-20 pt-10 border-t border-gray-200">
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-6 xxl:col-span-2">
                            <div class="intro-y flex-1 box py-10 lg:ml-5 mb-5 lg:mb-0">
                                <div class="border-gray-200 border-dashed">
                                    <div class="dz-message" data-dz-message style="margin-top: 1%;margin-bottom: 5%">
                                        <div>
                                            <img src="{{ asset('imgs/check.gif') }}" alt="">
                                        </div>
                                        <div class="text-lg font-medium">BERHASIL!</div>
                                        <div class="text-gray-600">  <br>
                                             <h3 class="font-medium text-lg">
                                                Terima kasih atas ucapannya, itu sangat berarti bagi kami</h3>  </div>
                                    </div>
                                    <a href="#">
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