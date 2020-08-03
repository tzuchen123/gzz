@extends('layouts.main')




@section('content')
article list
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@component('layouts.component.table.table')


@slot('th')
@component('layouts.component.table.th')排序@endcomponent
@component('layouts.component.table.th', ['width'=>'25%'])縮圖@endcomponent
@component('layouts.component.table.th')標題@endcomponent
@component('layouts.component.table.th-boolean')架@endcomponent
@component('layouts.component.table.th')操作@endcomponent
@endslot


@foreach ($models as $item)
<tr>
    <td>
        @component('layouts.component.table.update-rank')
            @slot('route', 'blog.article.rank.update')
            @slot('model', $item)
        @endcomponent
    </td>


    <td>
        @component('layouts.component.table.image')
        @slot('image', $item->image )
        @endcomponent
    </td>

    <td>
        {{$item->title}}
    </td>

    <td>
        {{-- <div class="custom-control custom-checkbox mb-2">
            <input model-id="{{$item->id}}" name="status" type="checkbox" class="custom-control-input status"
                id="status{{$item->id}}" route="{{route('blog.article.check.update')}}" {{($item['status'])?'checked':''}}>
            <label class="custom-control-label" for="status{{$item->id}}"></label>
        </div> --}}

        @component('layouts.component.table.checkbox')
            @slot('model', $item)
            @slot('name', 'status')
            @slot('route', 'blog.article.check.update')
        @endcomponent
    </td>

    <td>
        @component('layouts.component.table.edit')
        @slot('edit', route('blog.article.edit', [$item->id]))
        @slot('delete', route('blog.article.destroy', [$item->id]))
        @endcomponent
    </td>
</tr>
@endforeach


@endcomponent
{{$models->links()}}

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("input:checkbox").change(function() {
        var status = $(this).prop("checked") ? 1 : 0;
        var id = $(this).attr('model-id');
        var url = $(this).attr('route');
    
        console.log(id);
        $.ajax({
                type:'put',
                url:url,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { 
                    "id" : id,
                    "status" : status,
             },
                success: function(res){
                console.log(res)
                }
            });
        });
    });
    
    </script>


@endsection