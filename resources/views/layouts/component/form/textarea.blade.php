

<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <textarea class="form-control" type="text" rows="{{$row ?? 5}}" name="{{$name}}" id="{{$id}}" >{{$model[$name] ?? old($name) ?? $slot}}</textarea>
</div> 