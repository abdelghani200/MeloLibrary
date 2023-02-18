@extends('layouts.app')

@section('content')
<section class="mb-4">
    <div class="container">
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
                                    <source src="/images/audio/{{ $mu->audio }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div class="col-md-8">
                                <h2 class="card-title">{{ $mu->title }}</h2>
                                <p class="card-text">{{ $mu->artiste }}</p>
                                <p class="card-text"><small class="text-muted">{{ $mu->created_at }}</small></p>
                                <!-- <div class="stars">
                                    <a href="{{ route('music.rate', ['id' => $mu->id, 'stars' => 1]) }}"><i class="fas fa-star"></i></a>
                                    <a href="{{ route('music.rate', ['id' => $mu->id, 'stars' => 2]) }}"><i class="fas fa-star"></i></a>
                                    <a href="{{ route('music.rate', ['id' => $mu->id, 'stars' => 3]) }}"><i class="fas fa-star"></i></a>
                                    <a href="{{ route('music.rate', ['id' => $mu->id, 'stars' => 4]) }}"><i class="fas fa-star"></i></a>
                                    <a href="{{ route('music.rate', ['id' => $mu->id, 'stars' => 5]) }}"><i class="fa-regular fa-star"></i></a>
                                </div> -->

                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++) @if($i <=$mu->avg_rating)
                                        <i class="fas fa-star rated" data-rating="{{ $i }}"></i>
                                        @else
                                        <i class="far fa-star" data-rating="{{ $i }}"></i>
                                        @endif
                                        @endfor
                                </div>

                                <style>
                                    .stars i {
                                        color: gray;
                                        transition: color 0.2s;
                                        cursor: pointer;
                                    }

                                    .stars i:hover,
                                    .stars i.active {
                                        color: red;
                                        /* background-color: red; */
                                    }
                                </style>

                                <script>
                                    const stars = document.querySelectorAll('.stars i');
                                    const storageKey = 'music_rating_' + '{{ $mu->id }}';
                                    const storedRating = localStorage.getItem(storageKey);
                                    if (storedRating) {
                                        stars.forEach(star => {
                                            if (star.getAttribute('data-rating') <= storedRating) {
                                                star.classList.add('active');
                                            }
                                        });
                                    }
                                    stars.forEach(star => {
                                        star.addEventListener('click', () => {
                                            const rating = star.getAttribute('data-rating');
                                            stars.forEach(s => {
                                                if (s.getAttribute('data-rating') <= rating) {
                                                    s.classList.add('active');
                                                } else {
                                                    s.classList.remove('active');
                                                }
                                            });
                                            localStorage.setItem(storageKey, rating);
                                        });
                                    });
                                </script>




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
</section>
@endsection