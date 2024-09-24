<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here is your Todo list.') }}
            @if (session()->has('success'))
                <div x-data="{show: true}"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-show="show"
                    class="text-green-500 font-bold mt-4">

                        {{ session('success') }}

                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-block border border-1 py-2 px-4 border-green-500 mb-6 bg-green-200" href="{{ route('todos.create') }}">Add Todo</a>
                    <br>
                    @forelse ($todos as $todo)
                        <ul class="list-disc ml-4">
                            <li>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('todos.show', $todo) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline hover:font-semibold">
                                        {{ $todo->title }}
                                    </a>
                                    <div>
                                        <a class="inline-block border border-1 py-2 px-4 border-orange-500 bg-orange-200 ml-2 mb-1" href="{{ route('todos.edit', $todo) }}">Edit</a>
                                        <form class="inline-block" action="{{ route('todos.destroy', $todo) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="border border-1 py-2 px-4 border-red-500 bg-red-200 ml-2" type="submit"
                                            onclick="return confirm('Are you sure you want to delete this todo?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @empty
                        {{ __('You dont have anything on your Todo list...') }}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
