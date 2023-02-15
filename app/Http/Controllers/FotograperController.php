<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Tamu;
use App\Models\Undangan;
use App\Models\Album;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Session;

class FotograperController extends Controller
{
    public function index()
    {
        $undangan = Undangan::get()->all();
        foreach ($undangan as $key => $value) {
            $tamu = Tamu::where('undangan_id', $value->id)->get();
            $album = Album::where('undangan_id', $value->id)->get()->all();
            $undangan[$key]['jml_tamu'] = count($tamu);
            $undangan[$key]['jml_album'] = count($album);
        }
        $data = [
            'data' => $undangan,
            'menu_foto' => 'side-menu--active'
        ];
        // return response()->json($data, 200);
        return view('fotograper.index', $data);
    }

    public function album($id)
    {
        $undangan = Undangan::where('id', $id)->first();
        $tamu = Tamu::where('undangan_id', $id)->get()->all();

        $data = Album::where('album_foto.undangan_id', $id)->leftJoin('tamu', 'tamu.id', 'tamu_id')->select('album_foto.*', 'tamu.nama_tamu')->get()->all();
        foreach ($data as $key => $value) {
            $data[$key]['pernikahan'] = $undangan->nama_wanita . ' & ' . $undangan->nama_pria;
        }
        // return response()->json($data, 200);
        return view('fotograper.detail_album', compact('data', 'undangan', 'tamu'));
    }

    public function uploadGambar(Request $request)
    {
        $album = new Album;
        $nama_file_image = '-';

        $file = $request->file('gambar');
        $id = $request->id;
        $nama_file_image = $file->getClientOriginalName();
        $path = '/album/undangan/' . $request->undangan_id . '/';
        $output_file = $path . $nama_file_image;
        \Storage::disk('public')->put($output_file, file_get_contents($file));
        // $file->move($path,$nama_file_image);


        $album->undangan_id = $request->undangan_id;
        $album->tamu_id = $request->tamu_id;
        $album->image = $nama_file_image;
        $simpan = $album->save();


        if ($simpan) {
            Session::flash('success', 'Gambar Undangan berhasil di tambahkan');
            return redirect('detail-album/' . $request->undangan_id);
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect('detail-album/' . $request->undangan_id);
        }
    }

    public function add(Request $request)
    {
        $qrCode = $this->generateRandomString(15);

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

        // Generate QR dan save ke png
        $image = QrCode::format('png')
            //  ->merge(public_path('qrcodes/29.png'), 0.1, true)
            ->size(350)
            ->margin(3)
            ->errorCorrection('H')
            ->generate($code);
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

    public function generateRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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

    public function hapusGambar(Request $request)
    {
        DB::table('album_foto')->where('id', $request->id)->delete();
        return redirect('detail-album/' . $request->undangan_id)
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
}
