<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Kelas;
use App\Student;

class StatisticController extends Controller
{
    public function index(){
    	$data['data'] = Kelas::join('students','class.id','=','students.class_id')->get();
    	$data['kelas'] = User::join('class','users.id','=','class.user_id')->get();
    	$data['student'] = Kelas::join('students','class.id','=','students.class_id')->get();
    	return view('statistic.index',$data);
    }
    public function statistic(Request $request){
    	$data['student'] = Student::where('class_id',$request['id'])->get();

    	return view('statistic.statistic',$data);
    }
    public function get(Request $request){
    	$data = Student::where('class_id',$request['id'])->get();

    	return Response::json($data);
    }
}
