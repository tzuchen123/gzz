@extends('layouts.main')




@section('content')

<a href="{{ route('blog.catagory.create')}}"><button type="button" class="btn btn-secondary">新增分類</button></a>
<br>

catagory list




@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    @component('layouts.component.table.table')


        @slot('th')
          
            @component('layouts.component.table.th')標題@endcomponent
            {{-- @component('layouts.component.table.th-boolean')架@endcomponent --}}
            @component('layouts.component.table.th')操作@endcomponent
        @endslot


        @foreach ($models as $item)
        <tr>
       

            <td>
                {{$item->title}}
            </td>

            {{-- <td>
                @component('layouts.el.table.checkbox')
                    @slot('model', $item)
                    @slot('name', 'status')
                    @slot('route', 'member.check.update')
                 @endcomponent
            </td> --}}

            <td>
                @component('layouts.component.table.edit')
                    @slot('edit', route('blog.catagory.edit', [$item->id]))
                    @slot('delete', route('blog.catagory.destroy', [$item->id]))
                @endcomponent
            </td>
        </tr>
        @endforeach


    @endcomponent


@endsection
