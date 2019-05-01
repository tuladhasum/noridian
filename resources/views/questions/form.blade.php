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
   <label for="title">Title</label>
   <input type="text"
          class="form-control" name="title" id="title" aria-describedby="titleId"
          placeholder="Enter your Question title">
   <small id="titleId" class="form-text text-muted">Enter your question Title</small>
</div>

<div class="form-group">
   <label for="question">Question</label>
   <textarea class="form-control" name="question" id="question" rows="3"></textarea>
</div>
