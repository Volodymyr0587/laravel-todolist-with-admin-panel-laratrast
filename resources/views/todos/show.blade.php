<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here is your Todo - ') }} {{ $todo->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $todo->title }} <br>
                    {{ $todo->description }}
                </div>
                {{-- <a class="inline-block border border-1 py-2 px-4 border-green-500 ml-6 mb-6 bg-green-200" href="{{ route('todos.edit', $todo) }}">Edit</a>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form> --}}
            </div>
        </div>
    </div>
</x-app-layout>
