<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badges;
use App\Models\Models;
use App\Models\Tamu;
use App\Models\Undangan;


class MainController extends Controller
{

    public function index()
    {   
        $tamu = Tamu::get();
        $undangan = Undangan::get();
      
        $data = [
            'data'=>null,
            'undangan'=>count($undangan),
            'tamu'=>\count($tamu),
            'ticket'=>'0',
            'model'=>'0',
            'agency'=>'0',
            'pub_ticket'=>'0',
            'priv_ticket'=>'0',
            'menu_dashboard'=>'side-menu--active'
        ];
        // dd($data);
        return view('dashboard',$data);
    }
    
    
}
