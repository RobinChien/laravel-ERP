<tr>
<td>{{ str_repeat('----', isset($i) ? $i++ : 0) . $category['category']->category_name }}</td>
    <td>
    @permission('permission-show')
    <a class="btn btn-info" href="{{ route('product_categories.show', $category['category']->id) }}">Show</a>
    @endpermission
    @permission('product_categories-edit')
    <a class="btn btn-primary" href="{{ route('product_categories.edit', $category['category']->id) }}">Edit</a>
    @endpermission
    </td>
    @if(count($category['childs'])>0)
        @foreach($category['childs'] as $category)
            @include('product_categories.child', ['category' => $category, 'i' => isset($i) ? $i : 1])
        @endforeach
    @endif
</tr>
