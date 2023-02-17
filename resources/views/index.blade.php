@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <!-- <h1 class="my-4">Welcome to Workshop Laravel!
                <small>Welcome to homepage!!!</small>
            </h1> -->
            @foreach ($musicx as $mu)
            <div class="card mb-4">
                <div class="card-body" style="width: auto;">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('music.show', $mu->id) }}">
                                <img class="img-fluid rounded" src="/images/music/{{ $mu->image }}" alt="..." />
                            </a>
                            <audio controls>
                                <source src="" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-md-8">
                            <h2 class="card-title">{{ $mu->title }}</h2>
                            <p class="card-text">{{ $mu->artiste }}</p>
                            <p class="card-text"><small class="text-muted">{{ $mu->created_at }}</small></p>
                            <a href="{{ route('music.show', $mu->id) }}">&#9733;&#9733;&#9733;&#9733;&#9733;</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card my-4">
                <h5 class="card-header">All Music</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                <li><a href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection