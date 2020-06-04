@extends('parent')

@section('main')
<div align="right">
    <a href="{{route('studentinfo.create')}}" class="btn btn-success btn-sm">Add</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Image</th>
  <th width="10%">Student_ID</th>
  <th width="10%">Name</th>
  <th width="10%">Email</th>
  <th width="10%">School</th>
  <th width="10%">Program</th>
  <th width="10%">Batch</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="100" /></td>
   <td>{{ $row->student_ID }}</td>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->school }}</td>
   <td>{{ $row->program }}</td>
   <td>{{ $row->batch }}</td>
   <td>
        <a href="{{ route('studentinfo.show', $row->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('studentinfo.edit', $row->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('studentinfo.destroy', $row->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    
   </td>
  </tr>
 @endforeach
</table>
@endsection