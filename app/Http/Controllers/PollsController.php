<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class PollsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $polls = Poll::orderBy('id','desc')->paginate(5);
      return view('polls.index', compact('polls'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('polls.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $data = $request->validate([
         'title' => 'required'
      ]);

      Poll::create($data);

      return redirect('polls');
   }

   /**
    * Display the specified resource.
    *
    * @param \App\Poll $poll
    * @return \Illuminate\Http\Response
    */
   public function show(Poll $poll)
   {
//      dd($poll);
      return view('polls.show', compact('poll'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Poll $poll
    * @return \Illuminate\Http\Response
    */
   public function edit(Poll $poll)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Poll $poll
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Poll $poll)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param \App\Poll $poll
    * @return \Illuminate\Http\Response
    */
   public function destroy(Poll $poll)
   {
      //
   }
}
