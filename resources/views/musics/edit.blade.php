<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Edit') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('musics.update', $music) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" value="{{ $music->title }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <img src="/images/music{{ $music->image }}" width="300px">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="artiste">Artiste:</label>
                                <input type="text" name="artiste" value="{{ $music->artiste }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Ecrivain:</label>
                                <input type="text" name="ecrivain" value="{{ $music->ecrivain }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Langue:</label>
                                <input type="text" name="langue" value="{{ $music->langue }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Date_Sortie:</label>
                                <input type="text" name="date_sortie" value="{{ $music->date_sortie }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Duree:</label>
                                <input type="text" name="durée" value="{{ $music->durée }}" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-info">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>