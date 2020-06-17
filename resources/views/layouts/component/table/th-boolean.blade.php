{{-- <th class="col">
    <a href="?{{$booText ?? 'status'}}=1">{{$trueText ?? '上'}}</a>/
    <a href="?{{$booText ?? 'status'}}=0">{{$falseText ?? '下'}}</a>{{$slot ?? '架'}}
</th> --}}

<th scope="col" width="{{$width ?? ''}}">
    <a href="?{{$booText ?? 'status'}}=1">{{$trueText ?? '上'}}</a>/
    <a href="?{{$booText ?? 'status'}}=0">{{$falseText ?? '下'}}</a>
    {{$slot ?? '架'}}

</th>

