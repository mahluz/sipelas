@extends('layouts.operator-horizontal')
@section('class-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container-fluid">

	<a href="{{url('operator/class/create')}}"><button type="button" class="btn btn-success">Add new Class</button></a> 
	<a href="{{url('operator/statistic')}}"><button type="button" class="btn btn-primary pull-right">Need a Realtime Statistic ?</button></a>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Statistic
		</div>
		{{-- end heading --}}
		<div class="panel-body">

			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Data Siswa
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>No.</td>
										<td>Pengampu</td>
										<td>Kelas</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									@foreach($kelas as $index => $ini)
									<tr>
										<td>{{$index+1}}</td>
										<td>{{$ini->name}}</td>
										<td>{{$ini->class}}</td>
										<td>
											<span data-toggle="modal" data-target="modalStatistic">
												<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Statistic" onclick="statistic({{$ini->id}})">
													<i class="fa fa-bar-chart-o"></i>
												</a>
											</span>
											<span data-toggle="modal" data-target="modalStatistic">
												<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="modalDelete({{$ini->id}})">
													<i class="fa fa-times"></i>
												</a>
											</span>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Nilai Statistic
						</div>
						<div class="panel-body">
							<div id="zoomIn"></div>
							<div id="chart-container">
							</div>	
						</div>
					</div>
				</div>
			</div>
			{{-- end row --}}

		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
	{{-- every modal placed here --}}
	<!-- Modal -->
	<div id="modalStatistic" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Nilai</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="second-chart-container"></div>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	{{-- end modal --}}
	<!-- Modal -->
	<div id="modalDelete" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-sm">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Nilai</h4>
	      </div>
	      <div class="modal-body">
	      	<center>
	      		<h3>Are you sure ?</h3>
		    	<form id="kelasDelete" class="form" method="post" action="{{url('operator/class/delete')}}">
		    		<input type="hidden" name="id" id="kelasId" value="">
		    		{{csrf_field()}}
		    		<button type="submit" class="btn btn-danger">Delete</button>
		    	</form>	
	      	</center>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	{{-- end modal --}}
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){

	console.log({!!$data!!});
	$("table").DataTable();
	
	// console.log('kok ga mau???');
});
// end

function modalDelete(id){
	$("#modalDelete").modal();
	$("#kelasId").val(id);
	// $("#kelasDelete").submit();
}

function modalstatistic(id){
	$("#modalStatistic").modal();
	console.log(id);
	nama = [];
	nilai = [];
	backgroundColor = [];
	borderColor = [];
	var data = {!!$student!!}.filter(function(ini){
		return ini.class_id == id;
	});
	console.log(data);
	$.each(data,function(key,i){
		nama[key] = this.student;
		nilai[key] = this.value;
		backgroundColor[key] = "rgba("+getRandom(50,255)+","+getRandom(80,200)+","+getRandom(50,255)+",0.2)";
		borderColor[key] = "rgba("+getRandom(50,255)+","+getRandom(80,200)+","+getRandom(50,255)+",1)";
	});
	console.log(nama);
	var ctx = document.getElementById("mySecondChart").getContext('2d');
	ctx.height = 500;
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: nama,
	        datasets: [{
	            label: 'Nilai Kelas',
	            data: nilai,
	            backgroundColor: backgroundColor,
	            borderColor: borderColor,
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}

function getRandom(min,max){
	return Math.floor(Math.random() * max) + min;
} 

function statistic(id){
	// chart modal
	$("#mySecondChart").remove();
	$("#second-chart-container").append("<canvas id=mySecondChart></canvas>");

	//refreshing chart
	$("#myChart").remove();
	$("#myDonat").remove();

	//append new chart
	$("#chart-container").append("<canvas id=myChart></canvas><canvas id=myDonat></canvas>");

	nama = [];
	nilai = [];
	backgroundColor = [];
	borderColor = [];
	var data = {!!$student!!}.filter(function(ini){
		return ini.class_id == id;
	});
	console.log(data);
	$.each(data,function(key,i){
		nama[key] = this.student;
		nilai[key] = this.value;
		backgroundColor[key] = "rgba("+getRandom(50,255)+","+getRandom(80,200)+","+getRandom(50,255)+",0.2)";
		borderColor[key] = "rgba("+getRandom(50,255)+","+getRandom(80,200)+","+getRandom(50,255)+",1)";
	});
	console.log(nama,nilai,backgroundColor,borderColor);
	var ctx = document.getElementById("myChart").getContext('2d');
	var donut = document.getElementById("myDonat").getContext('2d');
	ctx.height = 500;
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: nama,
	        datasets: [{
	            label: 'Nilai Kelas',
	            data: nilai,
	            backgroundColor: backgroundColor,
	            borderColor: borderColor,
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
	var myPieChart = new Chart(donut,{
	    type: 'pie',
	    data: {
	        labels: nama,
	        datasets: [{
	            label: 'Nilai Kelas',
	            data: nilai,
	            backgroundColor: backgroundColor,
	            borderColor: borderColor,
	            borderWidth: 1
	        }]
	    },
	    
	});
	$("#zoomIn").html("<a class='btn btn-xs btn-default center-block' data-toggle='tooltip' data-placement='top' title='Perbesar' onclick='modalstatistic("+id+")' ><i class='fa fa-search'></i></a>");
}
// end statistic
</script>
@endsection