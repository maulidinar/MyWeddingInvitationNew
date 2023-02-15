<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('imgs/logo-app.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Undangan Digital</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('template/dist/css/app.css') }} " />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4" style="margin-left: -5%">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen" >
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-40" src="{{ asset('imgs/logo-app.png') }}">
                        
                    </a>
                    <div class="my-auto" style=" margin-top: 30%">
                        {{-- <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('imgs/ticket.png') }}"> --}}
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Digital Invitation
                
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">By : Maulidina</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div align="center" class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                         <!-- END: Top Bar -->
                    <div style="margin-top: 20%;;width: 70%" >
                        {{-- <h2 class="intro-y text-2xl font-medium mt-10 text-center mr-auto">
                           Input Kode Undangan
                            <p class="text-gray-600" style="font-size: 1rem"></p>
                        </h2>
                        <form class="intro-y" method="POST">
                            @csrf
                            <div class="mt-3 intro-y" >
                                <input required name="code" id="code" type="text" class="input-redem input w-full rounded-full border mt-2" placeholder="">
                            </div>
                            <div class="mt-3 intro-y">
                                <button type="submit" class="rounded-full button  shadow-md button--lg w-32 mr-1 mb-2  bg-theme-1 border text-white">SUBMIT</button>
                            </div>
                        </form> --}}
                        <a href="{{ URL::to('/login') }}">
                            <button class="rounded-full button  shadow-md button--lg w-32 mr-1 mb-2  bg-theme-1 border text-white">Login Admin</button>
                        </a>
                       
                    </div>

                    <script>
                        $(function () {
                          $('form').on('submit', function (e) {
                            e.preventDefault();
                            console.log('evem',e);
                            $.ajax({
                              type: 'post',
                              url: 'redeem-code',
                              data: $('form').serialize(),
                              success: function (res) {
                                console.log(res);
                                if(res.status){
                                    let t_id = res.data.ticket_id
                                    if(res.redeemed){
                                        Swal.fire({
                                        icon: 'warning',
                                        title: 'Oops...',
                                        text: 'Tiket ini sudah di redeem / expire',
                                        })
                                    }else{
                                        let timerInterval
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Berasil',
                                        html: 'Kode tiket berhasil di Redeem, harap tunggu...<br>',
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                            const content = Swal.getContent()
                                            if (content) {
                                                const b = content.querySelector('b')
                                                if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                        }).then((result) => {
                                        /* Read more about handling dismissals below */
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            console.log('I was closed by the timer',t_id)
                                            window.location = 'user-data?t_id='+t_id;
                                        }
                                        })
                                    }
                                    
                                }else{
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Kode tiket tidak terdaftar silahkan cek sekali lagi!',
                                    })
                                }
                              }
                            });
                          });
                        });
                      </script>
               

                <h2 class="intro-y text-2xl font-medium mt-10 text-center mr-auto">
                    
                    <p class="text-gray-600" style="font-size: 1rem"></p>
                </h2>
                <br>
     
              
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('template/dist/js/app.js') }} "></script>
        <!-- END: JS Assets-->
        <style>
            .input-redem{
                height: 60px;
                border-color: #CE1A9F;
                font-size: 1.8rem;
                text-align: center;
                font-weight: bold;
                text-transform: uppercase;
            }
        </style>
    </body>
</html>