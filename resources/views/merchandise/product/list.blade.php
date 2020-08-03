@extends('layouts.main')




@section('content')

<a href="{{ route('merchandise.product.create')}}"><button type="button" class="btn btn-secondary">新增商品</button></a>
<br>


product list
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
            @slot('route', 'merchandise.product.rank.update')
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
                id="status{{$item->id}}" route="{{route('merchandise.product.check.update')}}" {{($item['status'])?'checked':''}}>
            <label class="custom-control-label" for="status{{$item->id}}"></label>
        </div> --}}

        @component('layouts.component.table.checkbox')
            @slot('model', $item)
            @slot('name', 'status')
            @slot('route', 'merchandise.product.check.update')
        @endcomponent
    </td>

    <td>
        @component('layouts.component.table.edit')
        @slot('edit', route('merchandise.product.edit', [$item->id]))
        @slot('delete', route('merchandise.product.destroy', [$item->id]))
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