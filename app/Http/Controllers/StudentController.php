<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Student;
use App\Kelas;
use App\User;

class StudentController extends Controller
{
	public function index(){
		$data['student'] = Kelas::join('students','class.id','=','students.class_id')->get();
		return view('student.index',$data);
	}
	public function create(){
		$data['kelas'] = Kelas::get();
		return view('student.create',$data);
	}
	public function store(Request $request){
		$data = Student::create([
			"student" => $request['student'],
			"class_id" => $request['class'],
			"value" =>0,
			]);
		return redirect('operator/student');
	}
	public function edit(){

	}
	public function update(){

	}
	public function delete(Request $request){
		// $data = Student::where('id',$request['id'])->delete();

		// return redirect('operator/student');
		return "ngajak gelut loh? delete-delete data siswa ";
	}
    public function student(){
    	$data = Student::get();
    	return Response::json($data);
    }
}
