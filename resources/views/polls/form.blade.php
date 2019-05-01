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

<div class="form-group">
   <label for="title">Poll Name</label>
   <input type="text"
          class="form-control" name="title" id="title" aria-describedby="titleId" placeholder="Create a Poll">
   <small id="titleId" class="form-text text-muted">Enter a Poll name eg. Reddit Poll</small>
</div>
