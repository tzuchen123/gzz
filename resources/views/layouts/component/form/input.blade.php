<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="text" class="form-control" id="{{$id}}"  placeholder="{{$placeholder ?? '' }}"  name='{{$name}}' value="{{$model[$name] ?? old($name)}}">
    {{$slot}}
</div>

