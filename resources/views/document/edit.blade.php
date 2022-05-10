<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update Document') }}
                </h2>
                <p class="mt-2 text-sm text-gray-700">Click the Update button to update the information of your document.</p>
            </div>
            <div>
                <a href="{{ route('document.index') }}">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('View all documents') }}
                    </x-jet-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <livewire:document.form-edit :id="$document->id" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
