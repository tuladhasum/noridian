@extends('layouts.app')

@section('content')

   <div class="card">
      <div class="card-header"><strong>Polls</strong></div>
      <div class="body">

         @if($polls->count()>0)
            <table class="table">
               <thead class="thead-light">
               <tr>
                  <th scope="col">ID#</th>
                  <th scope="col" width="70%">Polls</th>
                  <th></th>
                  <th></th>
                  <th></th>
               </tr>
               </thead>
               <tbody>
               @foreach($polls as $poll)
                  <tr>
                     <th scope="row">{{$poll->id}}</th>
                     <td>{{$poll->title}}</td>
                     <td><a href="{{route('polls.show',['poll'=>$poll->id])}}" class="btn btn-sm btn-outline-dark">Show</a></td>
                     <td><a href="{{route('polls.edit',['poll'=>$poll->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                     <td><a href="{{route('polls.destroy',['poll'=>$poll->id])}}" class="btn btn-sm btn-outline-danger">Delete</a></td>
                  </tr>
               @endforeach
               </tbody>
            </table>
         @else
            <div class="alert alert-info alert-dismissible mb-0">No Polls Found</div>
         @endif

         {{ $polls->links() }}
      </div>
      <div class="card-footer">
         <a href="{{ route('polls.create') }}" class="btn btn-sm btn-success">Add New Poll</a>
      </div>
   </div>

@endsection
