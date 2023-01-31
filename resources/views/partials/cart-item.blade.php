<tr data-product_code="{{ $item->product_id }}">
    <td class="text-center" style="width:70px">
        <a href="product.html">
            <img src="{{ asset($item->product->images->count() ? 'storage/' . $item->product->images->first()->src : 'image/catalog/demo/product/80/1.jpg') }}"
                style="width:70px" alt="{{ $item->product->name }}" title="{{ $item->product->name }}" class="preview">
        </a>
    </td>
    <td class="text-left"> <a class="cart_product_name"
            href="{{ route('product-detail', ['product' => $item->product]) }}">{{ Str::words($item->product->name, 3, '...') }}</a>
    </td>
    <td class="text-center" id="item-{{ $item->product_id }}-quantity">
        {{ $item->amount }}</td>
    <td class="text-center">
        {{ ch_currency($item->product->price) }}
    </td>
    <td class="text-right">
        <a href="product.html" class="fa fa-edit"></a>
    </td>
    <td class="text-right">
        <a onclick="cart.remove('{{ $item->product_id }}', '{{ $item->user_id }}')" class="fa fa-times fa-delete"></a>
    </td>
</tr>
