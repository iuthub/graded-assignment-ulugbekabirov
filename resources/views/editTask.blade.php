@extends('welcome')
<br>
@section('content')
 <form action="{{ route('postEditTask')}}" method="post" id="taskForm">
 	@csrf
    <div id="myDIV" class="header">
      <h2>Edit panel</h2>
      <input type="text" name="name" value="{{$task['name']}}">
      <input type="text" name="id" hidden value="{{ $task['id'] }}"/>
      <button type="submit" class="addBtn">Edit</button>
    </div>
 </form>
@endsection