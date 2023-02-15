<!DOCTYPE html>
<html>

<head>
    <title>Laporan Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Tamu Pernikahan {{ $pengantin }}</h4>
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>QR</th>
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Ucapan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            {{ $kehadiran = ''; }}
            @foreach($data as $key => $value)
            @if ($value->kehadiran != NULL)
            {{ $kehadiran = 'Hadir'; }}
            @else
            {{ $kehadiran = 'Belum hadir'; }}
            @endif
            {{-- {{ 
                $kehadiran = '';
                if ($value->kehadiran != null) {
                    $kehadiran = 'Hadir'
                }
                else {
                    $kehadiran = 'Tidak hadir'
                }
             }} --}}
            <tr>
                <td>{{ $i++}}</td>
                <td align="center">
                    {{-- <img id="myImg{{ $key }}" onerror="this.onerror=null;this.src='{{ asset('images/noimage.png') }}';" width="70"
                        src="{{ asset('/storage/qrcodes/' . 'QR-'.$value->qr_code.'.png') }}" alt=""> --}}
                    {{ $value->qr_code }}
                </td>
                <td class="text-left">
                    <p class="flex items-center items-center">
                        {{ $value->nama_tamu }}</p>
                </td>
                <td class="text-left">
                    <p class="flex items-center items-center">
                        {{ $value->email }}</p>
                </td>
                <td class="text-left">
                    <p class="flex items-center items-center">
                        {{ $value->waktu }}</p>
                </td>
                {{-- <td class="table-report__action w-auto "> --}}
                <td class="text-left">
                    <p class="flex items-center items-center">
                        {{ $kehadiran }}</p>
                {{-- </td> --}}
                </td>
                <td class="text-left">
                    <p class="flex items-center items-center">
                        {{ $value->ucapan }}</p>
                </td>
            
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>