@extends('layouts.app')


<section class="mb-4">

    <div class="container text-center">
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" placeholder="Search" name="search" />
                </div>
                <button type="submit" class="btn btn-info" style="height: 38px;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>



    <div class="container">
        <div class="row">
    
            <div class="col-md-8">
                @foreach ($musicx as $mu)

                <div class="card mb-4" style="height:200px;">
                    <div class="card-body" style="width: auto;">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('music.show', $mu->id) }}">
                                    <img class="img-fluid rounded" style="width:300px;height:170px;" src="/images/music/{{ $mu->image }}" alt="..." />
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h2 class="card-title">{{ $mu->title }}</h2>
                                <p class="card-text"><small class="text-muted">{{ date("M j, Y", strtotime($mu->created_at)); }} | </small> {{ floor($mu->duree_sec/60) }} : {{ gmdate("s", $mu->duree_sec) }} </p>
                                <audio controls style="width:100%;">
                                    <source src="/images/audio/{{ $mu->audio }}" type="audio/mpeg">
                                </audio>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++) @if($i <=$mu->avg_rating)
                                            <i class="fas fa-star rated" data-rating="{{ $i }}"></i>
                                            @else
                                            <i class="far fa-star" data-rating="{{ $i }}"></i>
                                            @endif
                                            @endfor
                                            <span style="color: gray;">Like (29)</span>
                                    </div>
                                    <div class="items_dy">
                                        <i class="fa-regular fa-share-from-square"></i><span style="color: gray;">Share(04)</span>
                                    </div>
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