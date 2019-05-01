@extends('layouts.app')

@section('content')
   <div class="card">
      <h5 class="card-header">{{ $poll->title }} /  <strong>{{ $question->title }}</strong></h5>

      <div class="card-body">
         <h4 class="card-title">{{$question->title}}</h4>
         <p class="card-text">{{$question->question}}</p>
      </div>

      <ul class="list-group list-group-flush">
         @if($question->answers()->count()>0)
            @foreach($question->answers()->get() as $answer)
               <li class="list-group-item bg-light">
                  <div class="card-body">
                     <blockquote class="blockquote mb-0">
                        <p>{{$answer->answer}}</p>
                        <footer class="blockquote-footer">{{$answer->guest_name}}</footer>
                     </blockquote>
                  </div>
               </li>
            @endforeach
         @else

            <div class="alert alert-info mb-0">
               No Answers Found. Answer the question
            </div>
         @endif
      </ul>

      <div class="card-footer text-muted">
         <a href="{{route('polls.show',['poll'=>$poll->id, ])}}" class="btn btn-sm btn-outline-danger">Return to Question </a>
         <a href="{{route('answer.create',['poll'=>$poll->id,'question'=>$question->id])}}" class="btn btn-sm btn-outline-info">Post a Reply</a>
      </div>
   </div>
@endsection
