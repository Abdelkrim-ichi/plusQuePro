<div>
    <button wire:loading.attr="disabled" wire:click="retrieveMovies" class="{{ empty($message) ? 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150' : 'inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150' }}">
        <span wire:loading>
            Loading...
        </span>
        @if (empty($message))
            <span wire:loading.remove >
                Click to Retrieve Movies from the API
            </span>
        @else
            <span class="alert alert-success" wire:loading.remove>
                {{ $message }}
            </span>
        @endif
    </button>
</div>
