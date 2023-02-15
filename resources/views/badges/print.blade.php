<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('badge/IDCard.css') }} ">
    <title></title>
   
</head>
<body onload="window.print()">
<div class="container" id="printableArea" onload="window.print()">
    
    <div class="padding" >
    <div class="font" >
        {{-- <div class="companyname">1 Mei<br><span class="tab">Hotel Mulya</span></div> --}}
        <div  align="center">
            <div class="top">
                <img src="{{ asset('uploads/badge/'.$data->image) }}" alt="">
            </div>
            
                <div class="ename">
                <p class="p1"><b>{{ $data->badge_name }}</b></p>
                <p>{{ $data->roles_name }}</p>
                </div>
                <div class="barcode">
                    {!!QrCode::size(130)->generate($data->badge_code); !!}
                  <div style="text-align: center">
                    <h6>{{ $data->badge_code }}</h6>
                  </div>
                </div>
                <div class="edetails">
                </div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        window.location = 'badge-list';
    }, 100);
    
</script>
   
</div>
</body>
</html>
