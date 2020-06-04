@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('studentinfo.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
 <h3>Student ID - {{ $data->student_ID }} </h3>
 <h3>Student Name - {{ $data->name }}</h3>
 <h3>Email - {{ $data->email }} </h3>
 <h3>School - {{ $data->school }}</h3>
 <h3>Program - {{ $data->program }} </h3>
 <h3>Batch - {{ $data->batch }}</h3>
</div>
@endsection