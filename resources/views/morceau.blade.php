
@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <img class="card-img-top" src="/images/music/{{ $music->image }}" alt="{{ $music->title }}">
        <div class="card-body">
          <audio controls>
            <source src="/images/audio/{{ $music->audio }}" type="audio/mpeg">
          </audio>
          <h3 class="card-title">{{ $music->title }}</h3>
          <p class="card-text">Artist: {{ $music->artiste }}</p>
          <p class="card-text">Writer: {{ $music->ecrivain }}</p>
          <p class="card-text">Language: {{ $music->langue }}</p>
          <p class="card-text">Duration: {{ $music->durée }}</p>
          <p class="card-text">Release Date: {{ $music->date_sortie }}</p>
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
          <h5 class="card-title">hhh</h5>
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
              <textarea class="form-control" name="body" rows="4" placeholder="Enter your comment here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
