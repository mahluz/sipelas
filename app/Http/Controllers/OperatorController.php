<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;

class OperatorController extends Controller
{
    public function operator(){
    	return view('operator.operator');
    }
    public function index(){
    	$data['users']=role::join('users','roles.id','=','users.role_id')->get();

    	// dd($data['users']);
    	return view('operator.index',$data);
    }
    public function create(){
    	$data['role']=role::get();
    	// dd($data['role']);
    	return view('operator.create',$data);
    }
    public function store(Request $request){
        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id'=>$request['role']
            ]);
        return redirect('operator/user');
    }
    public function delete(Request $request){
        // dd($request);
    	$data=User::where('id',$request['id'])->delete();
    	return redirect('operator/user');
    }
}
