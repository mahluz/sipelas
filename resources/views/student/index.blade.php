@extends('layouts.operator-horizontal')
@section('student-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
	<a href="{{url('operator/student/create')}}"><button type="button" class="btn btn-success">Add new Student</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Class List
		</div>
		{{-- end heading --}}
		<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Siswa</th>
					<th>Kelas</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($student as $index => $ini)
				<tr>
					<td>{{$index+1}}</td>
					<td>{{$ini->student}}</td>
					<td>{{$ini->class}}</td>
					<td>
						<span data-toggle="modal" data-target="#myModal">
							<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="event.preventDefault();document.getElementById('edit{{$ini->id}}').submit();">
							<i class="fa fa-edit"></i>
							</a>
						</span>
						<span data-toggle="modal" data-target="#myModal">
							<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault();document.getElementById('delete{{$ini->id}}').submit();">
							<i class="fa fa-times"></i>
							</a>
						</span>
						<span data-toggle="modal" data-target="#myModal">
							<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="add Point" onclick="event.preventDefault();document.getElementById('addPoint{{$ini->id}}').submit();">
							<i class="fa fa-plus"></i>
							</a>
						</span>
						<form action="{{url('operator/nilai/store')}}" id="addPoint{{$ini->id}}" method="post">
							<input type="hidden" name="id" value="{{$ini->id}}">
							{{csrf_field()}}
						</form>
						<form action="{{url('operator/student/delete')}}" id="delete{{$ini->id}}" method="post">
							<input type="hidden" name="id" value="{{$ini->id}}">
							{{csrf_field()}}
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>	
		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">
	
$(document).ready(function(){

$("table").DataTable();

});
// end ready
</script>
@endsection