
{{--        @if(array_key_exists(0,$category))--}}
            {{--@if($category['category']->id == $category['parent_id'])--}}
            {{--<option value = "{{$category['category']->id}}" selected="selected">--}}
                {{--{{ str_repeat('----', isset($i) ? $i++ : 0) . $category['category']->category_name }}--}}
            {{--</option>--}}
            {{--@else--}}
                {{--<option value = "{{$category['category']->id}}">--}}
                    {{--{{ str_repeat('----', isset($i) ? $i++ : 0) . $category['category']->category_name }}--}}
                {{--</option>--}}
            {{--@endif--}}
        {{--@else--}}
            <option value = "{{$category['category']->id}}">
                {{ str_repeat('----', isset($i) ? $i++ : 0) . $category['category']->category_name }}
            </option>
        {{--@endif--}}

        @if(count($category['childs'])>0)
            @foreach($category['childs'] as $category)
                @include('product_categories.child_select', ['category' => $category, 'i' => isset($i) ? $i : 1])
            @endforeach
        @endif



