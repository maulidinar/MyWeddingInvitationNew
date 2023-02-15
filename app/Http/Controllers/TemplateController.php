<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Undangan;
use Illuminate\Support\Facades\DB;
use Session;

class TemplateController extends Controller
{
    public function index()
    {   
        $data = Template::get()->all();
        $menu_undangan = 'side-menu--active';
        // return response()->json($data, 200);
        return view('template.index',\compact('data','menu_undangan'));
    }

    public function add(Request $request){
        
       $nama_file_image = '-';
        $nama_file_audio = '-';
        if(!empty($request->file('frame_image'))){
            $file = $request->file('frame_image');
            $id = $request->id;
            // $nama_file_image = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            // $path = 'uploads/template';
            // $file->move($path,$nama_file_image);
             $nama_file_image = $file->getClientOriginalName();
            $path = '/album/undangan/'.$request->undangan_id.'/';
            $output_file = $path.$nama_file_image;
            \Storage::disk('public')->put($output_file,file_get_contents($file));
        }
        if($request->file('audio')){
            $file = $request->file('audio');
            $id = $request->id;
            $nama_file_audio = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            $path = 'uploads/audio';
            $file->move($path,$nama_file_audio);
        }
       

        $template = new Template;
        $template->frame_name = $request->frame_name;
        $template->frame_image = $nama_file_image;
        $template->audio = $nama_file_audio;
        $template->color = $request->color;
        $template->save();

        Session::flash('success', 'Template Undangan berhasil di tambahkan');
        return redirect()->route('template');

           
       
    }
    public function update(Request $request){
        $nama_file_image = '-';
        $nama_file_audio = '-';
        if(!empty($request->file('frame_image'))){
            $file = $request->file('frame_image');
            $id = $request->id;
            $nama_file_image = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            $path = 'uploads/template';
            $file->move($path,$nama_file_image);
        }
        if($request->file('audio')){
            $file = $request->file('audio');
            $id = $request->id;
            $nama_file_audio = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            $path = 'uploads/audio';
            $file->move($path,$nama_file_audio);
        }
       

        $template = new Template;
        $template->frame_name = $request->frame_name;
        $template->frame_image = $nama_file_image;
        $template->audio = $nama_file_audio;
        $template->color = $request->color;
        $template->save();

        Session::flash('success', 'Template Undangan berhasil di tambahkan');
        return redirect()->route('template');

           
       
    }

    public function destroy(Request $request)
    {
        DB::table('template_undangan')->where('id',$request->id )->delete();
        return redirect()->route('template')
                        ->with('success','Template deleted successfully');
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

        $qrCode = $url."/check-ticket-availability/?code=".$dataTicket->code;
        // GENERATE QR
        QrCode::format('png')->size(300)->margin(2)->generate($qrCode, $path.'/'.$id.'.png');
        /*echo "<pre>";
        print_r($dataTicket);
        echo "</pre>";
        die();*/
        
        return view('tickets.ticketdesign')->with(compact('dataTicket'));
    }

    public function undangan($code) {
        $data = Undangan::leftJoin('template_undangan','template_undangan.id','undangan.template_id')
        ->where('undangan.id',$code)->first();
        // return response()->json($data, 200);
        if(!empty($data)){
            return view('template.undangan_design')->with(compact('data'));
        }else{
            return response()->json(['Message'=>'Undangan tidak di temukan'], 200);
        }
        
    }

    public function undangan_temp($code) {
        $data = Undangan::where('id',$code)->first();
        $frame = Template::where('id',$data->template_id)->first();
        // return response()->json($frame, 200);
        if(!empty($data)){
            return view('template.undangan_temp')->with(compact('data','frame'));
        }else{
            return response()->json(['Message'=>'Undangan tidak di temukan'], 200);
        }
        
    }
    public function edit($id) {
        $data = Template::where('id',$id)->first();
        return response()->json(['data'=>$data], 200);
    }
}
