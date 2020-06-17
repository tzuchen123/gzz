<form method="POST" action="{{ route($route, [$model['id']]) }}">
    <div class="input-group">
        @csrf
        <input type="hidden" name="_method" value="put">
        <input name="rank" style="max-width:60px;" type="number" id="" class="form-control" value="{{$model['rank']}}"
            placeholder="排序">
        <div class="input-group-append">
            <button type="submit" id="" style="cursor: pointer; background-color: #fff;" class="input-group-text"><i
                    class="fas fa-upload"></i></button>
        </div>
    </div>
</form>

