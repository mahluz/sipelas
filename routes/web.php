<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('checking',function(){
	switch (Auth::user()->role_id) {
    case '1':
        return redirect('/admin');
      break;
    case '2':
        return redirect('/operator');
      break;
    default:
        return redirect('/home');
      break;
  }
});

Route::group(['middleware'=>'web'],function(){

	Route::group(['middleware'=>'role:1'],function(){
		Route::get('admin','AdminController@admin')->name('admin');
		Route::group(['prefix'=>'admin'],function(){
			Route::get('statistic','StatisticController@index');
		});
		// end group admin
	});
	// end middleware admin

	Route::group(['middleware'=>'role:2'],function(){

		Route::get('operator','OperatorController@operator')->name('operator');
		Route::group(['prefix'=>'operator'],function(){

			Route::get('user','OperatorController@index');
			Route::group(['prefix'=>'user'],function(){
				Route::get('create','OperatorController@create');
				Route::post('store','OperatorController@store');
				Route::post('delete','OperatorController@delete');
			});

			Route::get('class','ClassController@index');
			Route::group(['prefix'=>'class'],function(){
				Route::get('create','ClassController@create');
				Route::post('store','ClassController@store');
				Route::post('delete','ClassController@delete');
			});

			Route::get('student','StudentController@index');
			Route::group(['prefix'=>'student'],function(){
				Route::get('create','StudentController@create');
				Route::post('store','StudentController@store');
				Route::post('delete','StudentController@delete');
			});

			Route::get('statistic','StatisticController@index');
			Route::group(['prefix'=>'statistic'],function(){
				Route::post('index','StatisticController@statistic');
				Route::get('get','StatisticController@get');
			});

			Route::group(['prefix'=>'nilai'],function(){
				Route::post('store','NilaiController@store');
			});

		});
		// end group operator
	});
	// end middleware operator
});
// end middleware web

Route::group(['middleware'=>'api','prefix'=>'api'],function(){
	Route::get('student','StudentController@student');
});