@props([
    'sortColumn',
    'items',
    'title',
    'columns',
    'page',
    'perPage',
    'sortDirection',
    'routeView' => null,
])

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body border-bottom py-3">
        <div class="ms-auto text-muted align-items">

            <div class="col-span-6 sm:col-span-4">
                <x-label for="title" value="{{ __('Search') }}" />
                <x-input id="title" wire:model.live.debounce.600ms="search" type="text" class="mt-1 block w-full" wire:model="state.title" required autocomplete="title" />
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable" id="example"  class="cell-border">
            <x-table-head :columns="$columns" :sortColumn="$sortColumn" :sortDirection="$sortDirection" />
            <x-table-body :items="$items" :columns="$columns" :page="$page"
                :perPage="$perPage" />
        </table>
    </div>
    <br>
    <div class="card-footer d-flex align-items-center">
        <div class="d-flex">
            <div class="d-flex gap-4 align-items-center mb-3">
                <label for="perPage">Per Page</label>
                <select class="form-select" wire:model.live="perPage" id="perPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>

        {{ $items->links() }}
    </div>
</div>

<style>
    table tr td {
    border: 1px solid #000;
    }


    table tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
        background-color: #ddd;
    }
</style>

<script>
    window.addEventListener('flash-message', event => {
        const { type, message } = event.detail;
        alert(`${type}: ${message}`);
    });
</script>
