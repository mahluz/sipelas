<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class NilaiController extends Controller
{
    public function store(Request $request){
    	$nilai = Student::where('id',$request['id'])->first();
    	$point = $nilai->value +1;
    	$data = Student::where('id',$request['id'])->update([
    		"value"=>$point,
    		]);
    	return redirect('operator/student');
    }
}
