@extends('layouts.app')

@section('content')
   <div class="card">
      <h5 class="card-header">Discussion on <strong>{{ $poll->title }}</strong></h5>

      <ul class="list-group list-group-flush">
         @if($poll->questions()->count()>0)
            @foreach($poll->questions()->get() as $question)
               <li class="list-group-item">
                  <div class="card-body">
                     <h4 class="card-title">{{$question->title}}</h4>
                     <p class="card-text">{{$question->question}}</p>
                     <a href="{{route('questions.show',['poll'=>$poll->id,'question'=>$question->id])}}" class="btn btn-primary">Check Answers</a>
                  </div>
               </li>
            @endforeach
            @else
            <div class="alert alert-info mb-0">
               No Questions Found. Create a new Question
            </div>
            @endif
      </ul>

      <div class="card-footer text-muted">
         <a href="{{route('polls.index')}}">Return to Polls List</a>
         <a href="{{route('questions.create',['poll'=>$poll->id])}}" class="btn btn-sm btn-outline-info">Ask a Question</a>
      </div>
   </div>
@endsection
