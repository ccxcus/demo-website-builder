<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Websites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('websites.create') }}" class="border border-green-500 text-green-500 bg-green-200 px-2 py-1 rounded-md font-bold">
                            Create new
                        </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @endif

                    <table class="shadow-lg bg-white w-full">
                        <thead>
                            <tr>
                                <td class="bg-blue-100 border text-left px-8 py-4">#</td>
                                <td class="bg-blue-100 border text-left px-8 py-4">Title</td>
                                <td class="bg-blue-100 border text-left px-8 py-4">descirption</td>
                                <td class="bg-blue-100 border text-left px-8 py-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webSites as $w)
                                <tr>
                                    <td class="border px-8 py-4">{{$w->id}}</td>
                                    <td class="border px-8 py-4">{{$w->title}}</td>
                                    <td class="border px-8 py-4">{{$w->description}}</td>
                                    <td class="border px-8 py-4">
                                        <div class="flex justify-between items-center space-x-4">
                                            <a href="{{ route('websites.show', $w->slug) }}" target="_blank" class="border border-indigo-500 text-indigo-500 bg-indigo-200 px-2 py-1 rounded-md font-bold">
                                                Visit
                                            </a>

                                            <a href="{{ route('websites.edit-web', $w->id) }}" class="border border-yellow-500 text-yellow-500 bg-yellow-200 px-2 py-1 rounded-md font-bold">
                                                Builder
                                            </a>

                                            <a href="{{ route('websites.edit', $w->id) }}" class="border border-blue-500 text-blue-500 bg-blue-200 px-2 py-1 rounded-md font-bold">
                                                Edit
                                            </a>

                                            <form action="{{ route('websites.destroy', $w->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="delete" class="border border-red-500 text-red-500 bg-red-200 px-2 py-1 rounded-md font-bold">
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
