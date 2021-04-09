<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Websites') }}
        </h2>

        <p>
            <a href="{{ route('websites.create') }}">Create</a>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @endif

                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>descirption</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webSites as $w)
                                <tr>
                                    <td>{{$w->id}}</td>
                                    <td>{{$w->title}}</td>
                                    <td>{{$w->descirption}}</td>
                                    <td>
                                        <div class="flex justify-between space-x-4">
                                            <a href="{{ route('websites.edit-web', $w->id) }}" class="border border-green-500 text-green-500 bg-green-200 px-2 py-1 rounded-md">
                                                Edit Web
                                            </a>

                                            <a href="{{ route('websites.edit', $w->id) }}" class="border border-blue-500 text-blue-500 bg-blue-200 px-2 py-1 rounded-md">
                                                Edit config
                                            </a>

                                            <form action="{{ route('websites.destroy', $w->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="delete" class="border border-red-500 text-red-500 bg-red-200 px-2 py-1 rounded-md">
                                                    DELETE!
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
