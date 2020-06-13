
@isset($edit)

<div class="m-r-10">
    <a class="btn text-primary" href="{{$edit}}"><i class="fas fa-edit"></i></a>
</div>

@endisset

{{$slot}}

@isset($delete)
<div class="m-r-10">
    <form onSubmit="if(!confirm('確定要刪除嗎?')){return false;}" method="POST" action="{{$delete}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn text-primary"><i class=" fas fa-trash"></i></button>
    </form>
</div>

@endisset
