@extends('layouts.app')



<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="card-title">{{ $music->title }}</h3>
              <p class="card-text">Artist: {{ $music->artiste }}</p>
              <p class="card-text">Writer: {{ $music->ecrivain }}</p>
              <p class="card-text">Language: {{ $music->langue }}</p>
              <p class="card-text">Duration: {{ $music->durée }}</p>
              <p class="card-text badge bg-success">Release Date: {{ $music->date_sortie }}</p>
            </div>
            <div class="col-lg-6">
              <img class="card-img-top" src="/images/music/{{ $music->image }}" style="width: 100%; height: auto;" alt="{{ $music->title }}">
              <audio controls class="mb-3 mt-3" style="width: 100%">
                <source src="/images/audio/{{ $music->audio }}" type="audio/mpeg">
              </audio>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center my-5">
    <div class="col-lg-8">
      <h3 class="mb-3">Comments</h3>
      @foreach($comments as $comment)
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h5 class="card-title">Comment by <span style="color: blue;"> {{ $comment->user->name  }} </span> </h5>
          <p class="card-text">{{ $comment->body }}</p>
        </div>
      </div>
      @endforeach
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h5 class="card-title">Add Comment</h5>
          <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="music_id" value="{{ $music->id }}" />
            <div class="form-group">
              <label for="comment-textarea">Your comment:</label>
              <textarea class="form-control" id="comment-textarea" name="body" rows="4" placeholder="Enter your comment here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

