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

                    @endauth
                </div>
            @endif
        </td>
    @endforeach
</tr>
