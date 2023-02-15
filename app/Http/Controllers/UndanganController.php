<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Undangan;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Session;

class UndanganController extends Controller
{
    public function index()
    {
        $data = Undangan::leftJoin('template_undangan', 'template_undangan.id', 'undangan.template_id')
            ->select('*', 'undangan.id as id_u')
            ->get();
        $template = Template::get()->all();
        $menu_undangan = 'side-menu--active';
        // return response()->json($data, 200);
        return view('undangan.index', \compact('data', 'menu_undangan', 'template'));
    }

    public function add(Request $request)
    {
        $undangan = new Undangan;
        $nama_file_image = '-';
        $nama_file_image_pria = '-';

        $file = $request->file('foto_wanita');
        $id = $request->id;
        $nama_file_image = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
        $path = 'uploads/mempelai';
        $file->move($path, $nama_file_image);


        $file = $request->file('foto_pria');
        $id = $request->id;
        $nama_file_image_pria = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
        $path = 'uploads/mempelai';
        $file->move($path, $nama_file_image_pria);


        $tgl = date("Y-m-d H:i:s", strtotime($request->tanggal));
        $jam = date("H:i:s", strtotime($request->jam));
        $undangan->alamat = $request->alamat;
        $undangan->tanggal = $tgl;
        $undangan->waktu = $jam;
        $undangan->ig_pria = $request->ig_pria;
        $undangan->ig_wanita = $request->ig_wanita;
        $undangan->foto_pria = $nama_file_image_pria;
        $undangan->foto_wanita = $nama_file_image;
        $undangan->nama_wanita = $request->nama_wanita;
        $undangan->nama_pria = $request->nama_pria;
        $undangan->template_id = $request->template_id;
        $undangan->lat = $request->lat;
        $undangan->long = $request->long;
        $simpan = $undangan->save();
        $last_id = $undangan->id;


        if ($simpan) {
            Session::flash('success', 'Undangan berhasil di tambahkan');
            return redirect()->route('undangan-list');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('ticket');
        }
    }
    public function update(Request $request)
    {
        // $undangan = new Undangan;
        if ($request->file('foto_wanita')) {
            $file = $request->file('foto_wanita');
            $id = $request->id;
            $nama_file_image = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $path = 'uploads/mempelai';
            $file->move($path, $nama_file_image);
        }
        if ($request->file('foto_pria')) {
            $file = $request->file('foto_pria');
            $id = $request->id;
            $nama_file_image_pria = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $path = 'uploads/mempelai';
            $file->move($path, $nama_file_image_pria);
        }

        $tgl = date("Y-m-d H:i:s", strtotime($request->tanggal));
        $jam = date("H:i:s", strtotime($request->jam));
        $update = [
            'alamat' => $request->alamat,
            'tanggal' => $tgl,
            'waktu' => $jam,
            'ig_pria' => $request->ig_pria,
            'ig_wanita' => $request->ig_wanita,
            'nama_wanita' => $request->nama_wanita,
            'nama_pria' => $request->nama_pria,
            'template_id' => $request->template_id,
            'lat' => $request->lat,
            'long' => $request->long
        ];
        Undangan::where('id', $request->id)->update($update);
        Session::flash('success', 'Undangan berhasil di update');
        return redirect()->route('undangan-list');
    }

    public function destroy(Request $request)
    {
        Undangan::where('id', $request->id)->delete();
        return redirect()->route('undangan-list')
            ->with('success', 'Undangan deleted successfully');
    }
    public function printTicket($id)
    {
        $path = public_path('qrcodes');
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $url = URL::to('/');
        $dataTicket = Ticket_codes::join('tickets', 'tickets.id', '=', 'ticket_codes.ticket_id')
            ->where('ticket_codes.id', $id)
            ->where('ticket_codes.is_redem', "1")
            // ->where('is_redem', 1)
            ->select(
                'ticket_codes.id',
                'ticket_codes.code',
                'tickets.show',
                'tickets.show_date_start',
                'tickets.show_date_end'
            )
            ->first();
        if (empty($dataTicket)) {
            die("No ticket found");
        }

        $qrCode = $url . "/check-ticket-availability/?code=" . $dataTicket->code;
        // GENERATE QR
        QrCode::format('png')->size(300)->margin(2)->generate($qrCode, $path . '/' . $id . '.png');
        /*echo "<pre>";
        print_r($dataTicket);
        echo "</pre>";
        die();*/

        return view('tickets.ticketdesign')->with(compact('dataTicket'));
    }

    public function edit($id)
    {
        $data = Undangan::where('id', $id)->first();
        return response()->json(['data' => $data], 200);
    }
}
