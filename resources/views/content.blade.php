@extends('welcome')

  

@section('content')

        <ul id="myUL">
        @foreach($tasks as $task)  
          @component('taskItem')
              @slot('name')
                {{$task['name']}}
              @endslot
              @slot('id')
              {{$task['id']}}
              @endslot
          @endcomponent
        @endforeach

        </ul>

        @endsection