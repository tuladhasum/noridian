@extends('layouts.app')

@section('content')
   <div class="card">
      <div class="card-header">
         Polls
      </div>
      <div class="card-body">
         <form action="{{ route('polls.store') }}" method="post">
            @include('polls.form')
            <button type="submit" class="btn btn-outline-success ">Create Poll</button>
         </form>
      </div>
      <div class="card-footer text-muted">
         <a href="{{route('polls.index')}}" class="btn btn-sm btn-outline-dark">Back to Polls List</a>
      </div>
   </div>
@endsection
