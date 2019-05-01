@extends('layouts.app')

@section('content')
   <div class="card">
      <div class="card-header">
         Ask a new Question
      </div>
      <div class="card-body">
         <h4 class="card-title">{{$poll->title}}</h4>
         <p class="card-text">Ask question under</p>
         <form action="{{ route('questions.store',['poll'=>$poll->id]) }}" method="post">
            @include('questions.form')
            <button type="submit" class="btn btn-outline-success ">Ask Question</button>
         </form>
      </div>
      <div class="card-footer text-muted">
         <a href="{{route('polls.show',['poll'=>$poll->id])}}" class="btn btn-sm btn-outline-dark">Back to Polls </a>
      </div>
   </div>
@endsection
