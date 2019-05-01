@extends('layouts.app')

@section('content')
   <div class="card">
      <div class="card-header">
         Reply
      </div>
      <div class="card-body">
         <h4 class="card-title">{{$poll->title}} / {{$question->title}}</h4>
         <p class="card-text">{{$question->question}}</p>
         <form action="{{ route('answer.store',['poll'=>$poll->id,'question'=>$question->id]) }}" method="post">
            @include('answers.form')
            <button type="submit" class="btn btn-outline-success ">Post a Reply</button>
         </form>
      </div>
      <div class="card-footer text-muted">
         <a href="{{route('questions.show',['poll'=>$poll->id,'question'=>$question->id])}}" class="btn btn-sm btn-outline-dark">Back to Question </a>
      </div>
   </div>
@endsection
