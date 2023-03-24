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
          <h5 class="card-title">Comment by <span style="color: blue;"> {{ $comment->user->name }} </span> </h5>
          <p class="card-text">{{ $comment->body }}</p>
          <div class="card-text">
            Rating: {{ $comment->rating }}/5
          </div>
        </div>
      </div>

      @endforeach

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h5 class="card-title">Add Comment and Rating</h5>
          <form method="POST" action="{{ route('comments.store', ['music' => $music->id]) }}">
            @csrf
            <input type="hidden" name="music_id" value="{{ $music->id }}" />
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
            <div class="form-group">
              <label for="comment-textarea">Your comment:</label>
              <textarea class="form-control" id="comment-textarea" name="body" rows="4" placeholder="Enter your comment here..."></textarea>
            </div>
            <div class="form-group">
              <label for="rating">Your rating:</label>
              <div class="rating" style="color: gold;">
                <input type="radio" name="rating" value="5" id="star-5" />
                <label for="star-5" title="5 stars">
                  <i class="active fa fa-star"></i>
                </label>
                <input type="radio" name="rating" value="4" id="star-4" />
                <label for="star-4" title="4 stars">
                  <i class="active fa fa-star"></i>
                </label>
                <input type="radio" name="rating" value="3" id="star-3" />
                <label for="star-3" title="3 stars">
                  <i class="active fa fa-star"></i>
                </label>
                <input type="radio" name="rating" value="2" id="star-2" />
                <label for="star-2" title="2 stars">
                  <i class="active fa fa-star"></i>
                </label>
                <input type="radio" name="rating" value="1" id="star-1" />
                <label for="star-1" title="1 star">
                  <i class="active fa fa-star"></i>
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>