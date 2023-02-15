@extends('layout.frontend')
@section('content')
     <!-- BEGIN: Content -->
     <div class="content" align="center">
        <div class="intro-y box py-10 sm:py-20" style="border-radius: 20px">
            <div class="px-5 sm:px-20 pt-10 border-t border-gray-200">
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-6 xxl:col-span-2">
                            <div class="p-6 intro-y flex-1 box py-10 lg:ml-5 mb-5 lg:mb-0">
                                <div class="border-gray-200 border-dashed">
                                    <div class="dz-message" data-dz-message style="margin-top: 1%;margin-bottom: 5%">

                                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-middle">
                                        Terima kasih telah menyempatkan hadir
                                        </h2>

                                        <p class="intro-x font-reguler text-m xl:text-m text-center xl:text-middle mt-4">
                                        Kami tidak menyediakan kotak amplop di venue, jika kamu ingin berbagi kepada mempelai silahkan transfer ke nomor rekening <b>123456</b> (BCA A.N. myweddinginvitation)
                                        </p>

                                    <form method="POST" action="{{ URL::to('/add-ucapan') }}" id="ucapan-form">
                                        @csrf
                                        <div class="intro-x mt-8">
                                            <input name="code" id="code" type="hidden" class="input w-full border mt-2" placeholder="Input text here" value="{{ $code }}" required>

                                            <input name="ucapan" type="text" class="w-full intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Tulis ucapan untuk kedua mempelai">

                                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 mt-4">Kirim ucapan</button>
                                        </div>

                                    </form>
                                    
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