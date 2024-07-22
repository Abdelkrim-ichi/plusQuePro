<x-form-section submit="update">

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="title">
        Update
    </x-slot>

    <x-slot name="description">
        Update movie information
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="title" value="{{ __('title') }}" />
            <x-input id="title" type="text" class="mt-1 block w-full" wire:model="state.title" required autocomplete="title" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="overview" value="Overview" />
            <x-textarea id="overview" class="mt-1 block w-full" wire:model="state.overview" required autocomplete="overview"></x-textarea>
            <x-input-error for="overview" class="mt-2" />
        </div>



    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
