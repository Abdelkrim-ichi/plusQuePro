@props(['item', 'key', 'page', 'perPage', 'columns', 'routeView'=> null])

<tr wire:key="{{ $item->id . $page }}">
    @foreach ($columns as $column)
        <td>
            @if ($column['isData'])
                {!! $this->customFormat($column['column'], $column['hasRelation'] ? $item->{$column['column']}->{$column['columnRelation']} : $item->{$column['column']}) !!}
            @elseif ($column['column'] === 'action')
                <div class="flex gap-1 items-center justify-center">


                </div>
            @endif
        </td>
    @endforeach
</tr>
