<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelas;
use App\Student;

class ClassController extends Controller
{
    public function index(){
    	$data['data'] = Kelas::join('students','class.id','=','students.class_id')->get();
    	$data['kelas'] = User::join('class','users.id','=','class.user_id')->get();
    	$data['student'] = Kelas::join('students','class.id','=','students.class_id')->get();
    	return view('kelas.index',$data);
    }
    public function create(){
    	$data['guru'] = User::get();
    	return view('kelas.create',$data);
    }
    public function store(Request $request){
    	$data = Kelas::create([
    		"user_id" => $request['pengampu'],
    		"class" => $request['class']
    		]);
    	return redirect('operator/class');
    }
    public function delete(Request $request){
    	// $data = Kelas::where('id',$request['id'])->delete();
    	// return redirect('operator/class');
        return "mau ngapain lo delete-delete ?";
    }
}
