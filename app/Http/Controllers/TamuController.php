<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Tamu;
use App\Models\Undangan;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\UndanganMail;
use App\Mail\MailFoto;
use App\Models\Ucapan;
use Session;
use URL;
use PDF;

class TamuController extends Controller
{
    public function index()
    {
        $undangan = Undangan::get()->all();
        foreach ($undangan as $key => $value) {
            $tamu = Tamu::where('undangan_id', $value->id)->get();
            $undangan[$key]['jml_tamu'] = count($tamu);
        }
        $data = [
            'data' => $undangan,
            'menu_model' => 'side-menu--active'
        ];
        return view('tamu.list_undangan', $data);
    }

    public function listTamu($id)
    {
        $undangan = Undangan::where('id', $id)->first();
        $tamu = Tamu::where('undangan_id', $id)->paginate(10);
        $data = [
            'undangan' => $undangan,
            'data' => $tamu,
            'menu_model' => 'side-menu--active'
        ];
        return view('tamu.index', $data);
    }

    public function DownloadlaporanTamu($id)
    {
        $undangan = Undangan::where('id', $id)->first();
        $tamu = Tamu::where('undangan_id', $id)->get();
        $namaPengantin = $undangan->nama_pria . ' & ' . $undangan->nama_wanita;
        $data = [
            'undangan' => $undangan,
            'data' => $tamu,
            'menu_model' => 'side-menu--active'
        ];
        // return response()->json($data, 200);
        $pdf = PDF::loadview('laporan_tamu.laporan_pdf', ['data' => $tamu, 'pengantin' => $namaPengantin]);
        // return $pdf->download('laporan-data-tamu');
        // dd($namaPengantin);
        return $pdf->stream();
    }

    public function laporan()
    {
        $tamu = Tamu::leftJoin('undangan', 'undangan.id', 'tamu.undangan_id')
            ->select('tamu.*', 'undangan.nama_pria', 'undangan.nama_wanita', 'undangan.waktu')
            ->paginate(10);

        $undangan = Undangan::get()->all();
        foreach ($undangan as $key => $value) {
            $tamu = Tamu::where('undangan_id', $value->id)->get();
            $undangan[$key]['jml_tamu'] = count($tamu);
        }
        $data = [
            'data' => $undangan,
            'menu_laporan' => 'side-menu--active'
        ];
        return view('laporan_tamu.list_undangan', $data);
    }
    public function laporanTamu($id)
    {
        $tamu = Tamu::leftJoin('undangan', 'undangan.id', 'tamu.undangan_id')
            ->select('tamu.*', 'undangan.nama_pria', 'undangan.nama_wanita', 'undangan.waktu')
            ->where('undangan_id', $id)
            ->paginate(10);
        $data = [
            'data' => $tamu,
            'menu_laporan' => 'side-menu--active'
        ];
        // return response()->json($data, 200);
        return view('laporan_tamu.index', $data);
    }

    public function add(Request $request)
    {
        $qrCode = $this->generateRandomString(8);

        $tamu = new Tamu;
        $tamu->nama_tamu = $request->nama_tamu;
        $tamu->alamat = $request->alamat;
        $tamu->undangan_id = $request->undangan_id;
        $tamu->email = $request->email;
        $tamu->qr_code = $qrCode;
        $tamu->save();

        if ($tamu) {
            Session::flash('success', 'Data tamu berhasil di tambahkan');
            return redirect('/list-tamu/' . $request->undangan_id);
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect('/list-tamu/' . $request->undangan_id);
        }
    }

    public function genQR($code)
    {
        $tamu = Tamu::where('qr_code', $code)->first();
        $url = URL::to('/kehadiran-tamu/' . $code);
        // Generate QR dan save ke png
        $image = QrCode::format('png')
            //  ->merge(public_path('qrcodes/29.png'), 0.1, true)
            ->size(350)
            ->margin(3)
            ->errorCorrection('H')
            ->generate($url);
        $output_file = '/qrcodes/QR-' . $code . '.png';
        \Storage::disk('public')->put($output_file, $image);
        $path_get = 'storage/qrcodes/QR-' . $code . '.png';
        // \QrCode::size(500)
        //     ->format('png')
        //     ->generate($code, public_path('qrcode/'.$code.'.png'));
        return redirect('/list-tamu/' . $tamu->undangan_id)->with('success', 'Qr code berhasil di generate');
    }

    public function kehadiran($code)
    {
        $tamu = Tamu::where('qr_code', $code)->first();
        Tamu::where('qr_code', $code)->update([
            'kehadiran' => 'Hadir',
            'waktu' => date("Y-m-d h:m:s")
        ]);
        return view('front.konfirmasi', compact('tamu'));
    }

    public function ucapan($code)
    {
        $details = [
            'code' => $code
        ];

        return view('front.form_ucapan', $details);
    }

    public function addUcapan(Request $request)
    {
        $code = $request->code;
        Tamu::where('qr_code', $code)->update([
            'ucapan' => $request->ucapan
        ]);

        return view('front.add_ucapan_success');

        // return redirect('tulis-ucapan/' . $code);
    }

    public function generateRandomString($length = 25)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function edit($id)
    {
        $tamu = Tamu::where('id', $id)->first();
        $data = array('data' => $tamu);
        return response()->json($data, 200);
    }

    public function destroy(Request $request)
    {
        DB::table('tamu')->where('id', $request->id)->delete();
        return redirect()->route('tamu')
            ->with('success', 'Tamu deleted successfully');
    }

    public function doEdit(Request $request)
    {
        Tamu::where('id', $request->id)->update([
            'nama_tamu' => $request->nama_tamu,
            'alamat' => $request->alamat_tamu,
        ]);
        Session::flash('success', 'Data tamu berhasil di update');
        return redirect('/list-tamu/' . $request->undangan_id);
    }
    public function kirimUndangan(Request $request)
    {
        $tamu = Tamu::where('tamu.id', $request->tamu_id)->leftJoin('undangan', 'undangan.id', 'tamu.undangan_id')->first();
        Tamu::where('id', $request->tamu_id)->update(['status' => '1']);
        $url = URL::to('/undangan/' . $tamu->undangan_id);
        $urlUcapan = URL::to('/tulis-ucapan/' . $tamu->qr_code);
        $undangan = Undangan::where('id', $tamu->undangan_id)->first();
        //    return  response()->json($tamu, 200);
        $details = [
            'name' => $tamu->nama_tamu,
            'mempelai' => $undangan->nama_pria . ' & ' . $undangan->nama_wanita,
            'tanggal' => $undangan->tanggal,
            'body' => 'MOHON DOA RESTU PERNIKAHAN KAMI YANG INSYA ALLAH DI LAKSANAKAN PADA ',
            'qrcode' => URL::to('/storage/qrcodes/' . 'QR-' . $tamu->qr_code . '.png'),
            'url' => $url,
            'urlUcapan' => $urlUcapan
        ];
        // return view('email.undangan',$details);

        Mail::to($tamu->email)->send(new UndanganMail($details));
        Session::flash('success', 'Undangan berhasil di kirim');
        return redirect('list-tamu/' . $tamu->undangan_id);
    }
    public function kirimFotoMasal($id)
    {
        $tamu = Tamu::leftJoin('album_foto', 'album_foto.tamu_id', 'tamu.id')->where('tamu.undangan_id', $id)->get()->all();
        $url = URL::to('/undangan/' . $id);
        $undangan = Undangan::where('id', $id)->first();
        //    return  response()->json($tamu, 200);
        foreach ($tamu as $key => $value) {
            # code...
            $details = [
                'name' => $value->nama_tamu,
                'mempelai' => $undangan->nama_pria . ' & ' . $undangan->nama_wanita,
                'tanggal' => $undangan->tanggal,
                'body' => 'MOHON DOA RESTU PERNIKAHAN KAMI YANG INSYA ALLAH DI LAKSANAKAN PADA ',
                'qrcode' => URL::to('/storage/qrcodes/' . 'QR-' . $value->qr_code . '.png'),
                'foto' => URL::to('storage/album/undangan/' . $undangan->id . '/' . $value->image),
                'url' => $url
            ];
            // return view('email.undangan',$details);
            Mail::to($value->email)->send(new MailFoto($details));
            if ($key + 1 == count($tamu)) {
                Session::flash('success', 'Foto Masal berhasil di kirim');
                return redirect('detail-album/' . $id);
            }
        }
    }
    public function kirimUndanganMasal($id)
    {
        // $tamu = Tamu::where('undangan_id', $id)->get()->all();
        $tamu = Tamu::where('undangan_id', $id)->get()->all();
        $url = URL::to('/undangan/' . $id);
        // $urlUcapan = URL::to('/tulis-ucapan/' . $tamu->qr_code);
        $undangan = Undangan::where('id', $id)->first();
        //    return  response()->json($tamu, 200);
        foreach ($tamu as $key => $value) {
            Tamu::where('id', $value->id)->update(['status' => '1']);
            # code...
            $details = [
                'name' => $value->nama_tamu,
                'mempelai' => $undangan->nama_pria . ' & ' . $undangan->nama_wanita,
                'tanggal' => $undangan->tanggal,
                'body' => 'MOHON DOA RESTU PERNIKAHAN KAMI YANG INSYA ALLAH DI LAKSANAKAN PADA ',
                'qrcode' => URL::to('/storage/qrcodes/' . 'QR-' . $value->qr_code . '.png'),
                'url' => $url,
                'urlUcapan' => URL::to('/tulis-ucapan/' . $value->qr_code)
            ];
            // return view('email.undangan',$details);
            Mail::to($value->email)->send(new UndanganMail($details));
            if ($key + 1 == count($tamu)) {
                Session::flash('success', 'Undangan Masal berhasil di kirim');
                return redirect('list-tamu/' . $value->undangan_id);
            }
        }
    }

    public function testUndangan()
    {
        // $tamu = Tamu::where('undangan_id', $id)->get()->all();
        $tamu = Tamu::where('undangan_id', 7)->get()->all();
        // $url = URL::to('/undangan/' . $id);
        $urlUcapan = URL::to('/tulis-ucapan/' . $tamu[0]->qr_code);
        // $undangan = Undangan::where('id', $id)->first();

        dd($tamu, $urlUcapan);
    }
}
