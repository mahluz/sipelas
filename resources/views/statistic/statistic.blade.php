@extends('layouts.operator-horizontal')
@section('class-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading">
			Pilih Kelas
		</div>
		{{-- end heading --}}
		<div class="panel-body">

		<canvas id="myChart"></canvas>

		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){

	siswa = {!!$student!!};

	console.log(siswa[0].class_id);

	setInterval(function(){

		$.ajax({
			data: data={id:siswa[0].class_id},
			method:"get",
			url: "{{url('operator/statistic/get')}}"
		}).done(function(callback){
			// console.log(callback);
			nama = [];
			nilai = [];
			$.each(callback,function(key,i){
				nama[key] = this.student;
				nilai[key] = this.value;
			});

			var ctx = document.getElementById("myChart").getContext('2d');

			ctx.height = 500;

			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: nama,
			        datasets: [{
			            label: 'Nilai Kelas',
			            data: nilai,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			    	animation:false,
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});

		});

	},1000);

});
// end ready
</script>
@endsection