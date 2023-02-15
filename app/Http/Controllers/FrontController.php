<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Ticket_codes;
use App\Models\TicketPurchase;
use Illuminate\Support\Facades\DB;
use Session;

class FrontController extends Controller
{
    public function index(){

       

        $data = [
            't_reg'=> null,
            't_gold'=> null,
            't_prem'=> null,
        ];

        // return response()->json($data, 200);
        // return view('front.index',$data);
        return redirect('/login');
    }

    public function redeem(Request $request){
       $code = $request->code;
        $get = ['id'=>null];
        $get = Ticket_codes::select('*')->where('code',$code)->first();
        if($get){
                if($get->is_redem == '0'){
                    $data = [
                        'data'=>$get,
                        'status' => true,
                        'redeemed' => false
                    ];
                    return response()->json($data, 200);
                }else{
                    $data = [
                        'data'=>$get,
                        'status' => true,
                        'redeemed' => true
                    ];
                    return response()->json($data, 200);
                }
            } else {
                $data = [
                    'data'=>null,
                    'status' => false,
                    'redeemed' => false
                ];
                return response()->json($data, 200);
            }
    }

    public function userdata(Request $request){
        $id = $request->t_id;
        $val = Tickets::select('*')->where('id',$id)->get();
        foreach ($val as $key => $value) {
            $sisa_tp =  DB::table('ticket_codes')->where('ticket_id',$id)->where('is_redem','0')->count();
            $val[$key]['sisa']= $sisa_tp;
        }
        $data = [
            'data' => $val[0],
            'step_1'=>'bg-theme-12'
        ];
        // return response()->json($data, 200);
        return view('front.inputuser',$data);
    }
    
    public function usersave(Request $request){
        $val = Tickets::select('*')->where('id',$request->ticket_id)->first();

        $customer = new TicketPurchase;
        $customer->customer_name = $request->fullname;
        $customer->customer_phone = $request->phone;
        $customer->customer_email = $request->email;
        $customer->ticket_id = $request->ticket_id;
        $customer->status = 2; 
        $save = $customer->save();
        $las_id = $customer->id;


        if($save){
            $data = [
                'data' => $val,
                'id_customer' => $las_id,
                'ticket_id' =>$request->ticket_id,
                'step_2'=>'bg-theme-12'
            ];
            return view('front.pembayaran',$data);
        }

    }
    public function payment(Request $request){
        // \dd($request->all());
        $file = $request->file('upload_file');
        $id = $request->user_id;
        $t_id = $request->ticket_id;
		$nama_file = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $path = 'uploads/payment';
		$file->move($path,$nama_file);
                 $update =  DB::table('ticket_redeem_purchase')
                ->where('id', $id)
                ->update([
                    'payment_proof' => $nama_file,
                    ]);
                     if($update){
                        $data = [
                        'step_4'=>'bg-theme-9'
                        ];
                        return view('front.done',$data);
                    }
    }

    public function paymentact(Request $request){
        $data = [
             'step_4'=>'bg-theme-9'
            ];
        return view('front.done',$data);
    }
}
