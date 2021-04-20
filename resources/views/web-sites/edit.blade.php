<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Websites create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="border border-red-500 text-red-500 bg-red-200 mb-2 p-2">
                            <strong class="text-semibold">Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('websites.update', $website->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <div class="w-full my-2">
                                <label class="block font-bold">Name:</label>
                                <input type="text" name="name" class="w-full rounded" placeholder="Name" value="{{ old('name', $website->name) }}">
                            </div>

                            <div class="w-full my-2">
                                <label class="block font-bold">Title:</label>
                                <input type="text" name="title" class="w-full rounded" placeholder="Title" value="{{ old('title', $website->title) }}">
                            </div>

                            <div class="w-full my-2">
                                <label class="block font-bold">Slug:</label>
                                <input type="text" name="slug" class="w-full rounded" placeholder="Slug" value="{{ old('slug', $website->slug) }}">
                            </div>

                            <div class="w-full my-2">
                                <label class="block font-bold">Description:</label>
                                <textarea class="w-full rounded" style="height:150px" name="description"
                                          placeholder="description">{{ old('description', $website->description) }}</textarea>
                            </div>

                            <x-button type="submit" class="btn btn-primary">Submit</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
