@props(['item', 'key', 'page', 'perPage', 'columns', 'routeView'=> null])

<tr wire:key="{{ $item->id . $page }}">
    @foreach ($columns as $column)
        <td>
            @if ($column['isData'])
                {!! $this->customFormat($column['column'], $column['hasRelation'] ? $item->{$column['column']}->{$column['columnRelation']} : $item->{$column['column']}) !!}
            @elseif ($column['column'] === 'action')
                <div class="flex gap-1 items-center justify-center">
                    @auth
                        <a href="{{ route('edit', $item->id) }}" class="flex btn px-1 py-1 rounded-md  text-bg-yellow">
                            <x-heroicon-s-pencil class="w-4 h-4 p-1 text-bg-yellow" />
                        </a>

                        <button wire:loading.attr="disabled" onclick="confirmDeletion({{ $item->id }}, '{{ $item->title }}')" class="flex btn px-1 py-1 text-bg-red">

                            <span wire:loading wire:target="delete({{ $item->id }})">
                                <x-heroicon-c-ellipsis-horizontal class="w-4 h-4 p-1 text-bg-red" style="color: red"/>
                            </span>
                            <span wire:loading.remove wire:target="delete({{ $item->id }})">
                                <x-heroicon-s-trash class="w-4 h-4 p-1 text-bg-red" />
                            </span>
                        </button>
                    @endauth

                </div>
            @endif
        </td>
    @endforeach
</tr>

<script>
    function confirmDeletion(id, title) {
        if (confirm('Are you sure you want to delete this item? title: '+ title)) {
            @this.call('delete', id);
        }
    }
</script>
