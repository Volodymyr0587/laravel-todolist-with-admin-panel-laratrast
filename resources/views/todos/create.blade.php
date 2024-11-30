<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Todo to your list.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form class="w-full px-4 " action="{{ route('todos.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="title" class="mb-3 block text-base font-medium text-black">
                                {{ __("Add your todo title") }}:
                            </label>
                            <input type="text" name="title" placeholder="What you have to do?" value="{{ old('title') }}"
                            class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                            active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                            transition disabled:cursor-default disabled:bg-[#F5F7FD]" />

                            @error('title')
                            <div class="mt-2">
                                <span class="text-red-500 text-sm font-bold">{{ $message }}</span>
                            </div>
                            @enderror


                            <label for="description" class="mb-3 mt-3 block text-base font-medium text-black">
                                {{ __("Add your todo description") }}:
                            </label>
                            <textarea name="description" id="description" cols="30" rows="10"
                            class="border-form-stroke text-body-color placeholder-body-color focus:border-primary
                            active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none
                            transition disabled:cursor-default disabled:bg-[#F5F7FD]">{{ old('description') }}</textarea>

                            @error('description')
                            <div class="mt-2">
                                <span class="text-red-500 text-sm font-bold">{{ $message }}</span>
                            </div>
                            @enderror

                            <div class="flex items-center gap-x-4">
                                <label for="completed" class="mb-3 mt-3 block text-base font-medium text-black">
                                    {{ __("Completed") }}:
                                </label>
                                <input id="completed" name="completed" type="checkbox" value="1"
                                        @checked(old('completed'))
                                        class="h-4 w-4 rounded border-gray-500 text-indigo-600 focus:ring-indigo-600">
                            </div>


                        </div>
                        <button type="submit"
                                class="inline-block border border-1 py-2 px-4 border-green-500 mb-6 bg-green-200">
                            Add todo
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
