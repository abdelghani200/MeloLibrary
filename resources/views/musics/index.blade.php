<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a class="btn btn-success" href="{{ route('musics.create') }}">Add new Music</a>
                        <br /><br />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Artiste</th>
                                    <th>Ecrivain</th>
                                    <th>Langue</th>
                                    <th>Date_Sortie</th>
                                    <th>Duree</th>
                                    <th>Image</th>
                                    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($musicx as $mu)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $mu->title }}</td>
                                    <td>{{ $mu->artiste }}</td>
                                    <td>{{ $mu->ecrivain }}</td>
                                    <td>{{ $mu->langue }}</td>
                                    <td>{{ $mu->date_sortie }}</td>
                                    <td>{{ $mu->durée }}</td>
                                    <td><img src="/images/music/{{ $mu->image }}"></td>
                                    <td class="d-flex text-center" style="justify-content: center;">
                                        <a class="btn btn-primary" href="{{ route('musics.edit', $mu) }}">Update</a>
                                        <form method="POST" action="{{ route('musics.destroy', $mu) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ms-3" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>