<section class="mb-4">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td class="d-flex text-center" style="justify-content: center;">
                                        <a class="btn btn-primary" href="{{ route('comments.edit', $comment) }}">Update</a>
                                        <form method="POST" action="{{ route('comments.destroy', $comment) }}">
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

</section>