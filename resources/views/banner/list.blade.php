@extends('layouts.main')




@section('content')
banner list

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
            <th scope="row">1</th>

            <td>
                @component('layouts.component.table.image')
                    @slot('image', $item->image )
                @endcomponent
            </td>

            <td>
                {{$item->title}}
            </td>

            <td>

            </td>

            <td>
                @component('layouts.component.table.edit')
                    @slot('edit', route('banner.edit', [$item->id]))
                    @slot('delete', route('banner.delete', [$item->id]))
                @endcomponent
            </td>
        </tr>
        @endforeach


    @endcomponent


@endsection
