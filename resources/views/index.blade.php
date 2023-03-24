@extends('layouts.app')


<section class="mb-4">

    <div class="container text-center">
        <form id="search-form" action="{{ route('search') }}" method="GET">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="search" class="form-control" placeholder="Search" name="search" />
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
                                        <div class="card-text">
                                            @if($mu->comments->count() > 0)
                                            @php $avgRating = $mu->comments->avg('rating'); @endphp
                                            @for($i = 1; $i <= 5; $i++) @if($i <=$avgRating) <i class="fa fa-star" style="color:gold"></i>
                                                @else
                                                <i class="fa fa-star"></i>
                                                @endif
                                                @endfor
                                                <span style="color: gray;">Rating ({{ $avgRating }}/5)</span>
                                                @else
                                                <span style="color: gray;">Aucun rating pour cette musique</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="items_dy">
                                        <i class="fa-regular fa-share-from-square"></i><span style="color: gray;">Share(04)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <!-- Pagination -->

            <!-- Pagination -->
            @if ($musicx instanceof Illuminate\Pagination\LengthAwarePaginator)
            {{ $musicx->links() }}
            @endif

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