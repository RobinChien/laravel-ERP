<tr>
        <td>
            {{ str_repeat(' ｜', isset($i) ? $i++ : 0) . $product_table['category']->product_name }}
        </td>
        <td>
            {{ $product_table['category']->qty }}
        </td>
</tr>

    @if(count($product_table['childs'])>0)
        @foreach($product_table['childs'] as $product_table)
            @include('product.child', ['category' => $category, 'i' => isset($i) ? $i : 1])
        @endforeach
    @endif
