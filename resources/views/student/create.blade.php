@extends('layouts.operator-horizontal')
@section('student-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			Pendaftaran Siswa
		</div>
		<div class="panel-body">
			<form class="form" action="{{url('operator/student/store')}}" method="post">
				<div class="form-group">
					<span class="label label-default">Nama</span>
					<input type="text" name="student" class="form-control">
				</div>
				<div class="form-group">
					<span class="label label-default">Kelas</span>
					<select name="class" class="form-control">
						@foreach($kelas as $index => $ini)
						<option value="{{$ini->id}}">{{$ini->class}}</option>
						@endforeach
					</select>
				</div>
				{{csrf_field()}}
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
		</div>
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