<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Undangan </title>
</head>
<body>
  <div align="center">
    <div style="
      background-repeat: no-repeat;height: 100vh;width: 100vh;background-image: url('{{ asset('uploads/template/'.$frame->frame_image) }}');">
      <div style="padding: 150px;">
        <h2 style="text-align:center;margin-top: 30%">MOHON DOA RESTU</h2>
        <div style="text-align:center">ATAS PERNIKAHAN KAMI</div>
        <h2 style="text-align:center;text-transform: capitalize">{{ $data->nama_pria }}</h2>
        <p style="text-align:center">dengan</p>
        <h2 style="text-align:center;text-transform: capitalize">{{ $data->nama_wanita }}&nbsp;</h2>
        <p style="text-align:center">Tanpa mengurangi rasa hormat kami mengundang</p>
        <p style="text-align:center">Bapak/Ibu/saudara/i pada pernikahan kami</p>
        <p style="text-align:center">Yang akan dilakasanakan pada</p>
        <table cellpadding="1" cellspacing="1" style="width:351px">
          <tbody>
            <tr>
              <td style="width:198px">Hari</td>
              <td style="width:137px">Jumat</td>
            </tr>
            <tr>
              <td style="width:198px">Tanggal</td>
              <td style="width:137px">{{ $data->waktu }}</td>
            </tr>
            <tr>
              <td style="width:198px">Pukul</td>
              <td style="width:137px">12:00 s.d Selesai</td>
            </tr>
          </tbody>
        </table>
      
        <p style="text-align:center">Desa bogor Bogr selatan</p>
      </div>
    </div>
    
   
  </div>
  
</body>
</html>