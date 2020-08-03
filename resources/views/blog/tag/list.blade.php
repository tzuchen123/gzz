@extends('layouts.main')




@section('content')

<a href="{{ route('blog.tag.create')}}"><button type="button" class="btn btn-secondary">新增標籤</button></a>
<br>

sort list




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
                    @slot('edit', route('blog.tag.edit', [$item->id]))
                    @slot('delete', route('blog.tag.destroy', [$item->id]))
                @endcomponent
            </td>
        </tr>
        @endforeach


    @endcomponent


@endsection
