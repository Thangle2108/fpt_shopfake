<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="slug" :value="__('Slug')" />
                        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                    </div>
                    <div>
                        <x-input-label for="parent_id" :value="__('Parent Category')" />
                        <select id="parent_id" name="parent_id" class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">{{ __('None') }}</option>
                            @foreach($parents as $id => $name)
                                <option value="{{ $id }}" @selected(old('parent_id') == $id)>{{ $name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('parent_id')" />
                    </div>
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
