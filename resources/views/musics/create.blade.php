<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Music') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('musics.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titre:</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category:</label>
                                <select name="category_id" class="form-select" placeholder="categorie">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="artiste">Artiste:</label>
                                <input type="text" name="artiste" class="form-control" id="artiste">
                            </div>
                            <div class="form-group">
                                <label for="ecrivain">Ecrivain:</label>
                                <input type="text" name="ecrivain" class="form-control" id="ecrivain">
                            </div>
                            <div class="form-group">
                                <label for="langue">Langue:</label>
                                <input type="text" name="langue" class="form-control" id="langue">
                            </div>
                            <div class="form-group">
                                <label for="date_sortie">Date_Sortie:</label>
                                <input type="date" name="date_sortie" class="form-control" id="date_sortie">
                            </div>
                            <div class="form-group">
                                <label for="durée">Duree:</label>
                                <input type="time" name="durée" class="form-control" id="durée">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>