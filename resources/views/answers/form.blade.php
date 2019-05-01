@csrf
@if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

<input type="hidden" name="poll_id" value="{{$poll->id}}">
<input type="hidden" name="question_id" value="{{$question->id}}">

<div class="form-group">
   <label for="guest_name">Replied by</label>
   <input type="text" value="{{ old('guest_name') ?? $answer->guest_name }}"
          class="form-control" name="guest_name" id="guest_name" aria-describedby="guestId"
          placeholder="Please enter your full name">
   <small id="guestId" class="form-text text-muted">Please enter your full name</small>
</div>

<div class="form-group">
   <label for="answer">Answer</label>
   <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
</div>
