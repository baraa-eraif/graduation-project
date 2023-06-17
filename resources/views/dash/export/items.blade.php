@if(count($value['items']))
<table>
    <thead>
    <tr>
        <th>{{ trans('lang.name') }}</th>
        <th>{{ trans('lang.quantity') }}</th>
        <th>{{ trans('lang.price') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($value['items'] as $item)
        <tr>
            <td>{{$item['name']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['price']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p class="text-center">{{ trans('lang.no_item_found') }}</p>
@endif
