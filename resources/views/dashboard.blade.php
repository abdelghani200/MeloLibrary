
<section class="mb-4">

<x-app-layout>
   
<div class="container">

    <!-- class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" -->
    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Tableau de bord</h1>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="height: 180px;">
                        <h5 class="card-title">All Categories</h5>
                        <p class="card-text" style="position: absolute;top: 90px;font-size:2rem">10</p>
                        <div class="user">
                            <a href="{{ route('categories.index') }}" style="position: absolute;top: 90px;right: 20px;font-size:2rem"><i class="fa-solid fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="height: 180px;">
                        <h5 class="card-title">All Music</h5>
                        <p class="card-text" style="position: absolute;top: 90px;font-size:2rem">10</p>
                        <div class="user">
                            <a href="{{ route('musics.index') }}" style="position: absolute;top: 90px;right: 20px;font-size:2rem"><i class="fa-solid fa-music"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="height: 180px;">
                        <h5 class="card-title">All Commentes</h5>
                        <p class="card-text" style="position: absolute;top: 90px;font-size:2rem">10</p>
                        <div class="user">
                            <a href="{{ route('comments.index') }}" style="position: absolute;top: 90px;right: 20px;font-size:2rem"><i class="fa-solid fa-comment"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

</x-app-layout>

</section>