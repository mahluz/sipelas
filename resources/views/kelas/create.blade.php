@extends('layouts.operator-horizontal')
@section('css')

@endsection

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Form Penambahan Kelas Baru
		</div>
		<div class="panel-body">
			<form class="form" action="{{url('operator/class/store')}}" method="post">
				<div class="form-group">
					<span class="label label-default">Nama Kelas: </span>
					<input type="text" name="class" class="form-control">
				</div>
				<div class="form-group">
					<span class="label label-default">Pengampu: </span>
					<select name="pengampu" class="form-control">
						@foreach($guru as $index => $ini)
						<option value="{{$ini->id}}">{{$ini->name}}</option>
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

@endsection