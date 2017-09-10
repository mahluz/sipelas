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

			<form method="post" action="{{url('operator/statistic/index')}}">
				<span class="label label-default">Pilih Kelas: </span>
				<select name="id" class="form-control">
					@foreach($kelas as $index => $ini)
					<option value="{{$ini->id}}">{{$ini->class}}</option>
					@endforeach
				</select><hr>
				{{csrf_field()}}
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>

		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection