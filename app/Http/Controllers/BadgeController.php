<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Badges;

class BadgeController extends Controller
{
    public function index(){
        // $badge = Badges::latest()->paginate(5);
        $badge = DB::table('badges')
        ->join('roles', 'badges.role_id', '=', 'roles.id')
        ->select('badges.*', 'roles.roles_name')
        ->paginate(5);
        
        $roles = DB::table('roles')->select('*')->get();

        $data = [
            'data'=>$badge,
            'roles' =>$roles,
            'menu_badge'=>'side-menu--active'
        ];
        
        return view('badges.badgelist',$data);
    }

    public function store(Request $request)
    {   // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('upload_file');
		$nama_file = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $path = 'uploads/badge';
		$file->move($path,$nama_file);
        $badge_code = 'BADGE-'.rand(0,999999999);
        Badges::create([
			'image' => $nama_file,
            'badge_code' =>$badge_code,
			'badge_name' => $request->badge_name,
			'role_id' => $request->role,
		]);
           
		return redirect()->back();
        
    }

    public function destroy(Request $request)
    {
        DB::table('badges')->where('id',$request->id )->delete();
        return redirect()->route('badge')
                        ->with('success','Badge deleted successfully');
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $badge = DB::table('badges')
        ->join('roles', 'badges.role_id', '=', 'roles.id')
        ->where('badges.id',$id)
        ->select('badges.*', 'roles.roles_name')
        ->get();
        if($badge){
            $zone = DB::table('role_area_permission')
            ->join('areas', 'role_area_permission.area_id', '=', 'areas.id')
            ->where('role_area_permission.role_id',$badge[0]->role_id)
            ->select('areas.area_name')
            ->get();

            $data = [
                'data'=> $badge,
                'zone'=> $zone,
                'success'=>true
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'success' =>false
            ];
            return response()->json($data, 200);
        }
       
        
    }

    public function print(Request $request)
    {
        $id = $request->id;
        $val = DB::table('badges')
        ->join('roles', 'badges.role_id', '=', 'roles.id')
        ->select('badges.*', 'roles.roles_name')
        ->where('badges.id',$id)->get();

        $data = [
            'data'=>$val[0],
            'roles' =>null,
            'menu_badge'=>'side-menu--active'
        ];
        // return response()->json($val[0], 200,);
        return view('badges.print_preview',$data);
    }

    public function printact(Request $request)
    {
        $id = $request->id;
        $val = DB::table('badges')
        ->join('roles', 'badges.role_id', '=', 'roles.id')
        ->select('badges.*', 'roles.roles_name')
        ->where('badges.id',$id)->get();

        $data = [
            'data'=>$val[0],
            'roles' =>null,
            'menu_badge'=>'side-menu--active'
        ];
        // return response()->json($val[0], 200,);
        return view('badges.print',$data);
    }
}
