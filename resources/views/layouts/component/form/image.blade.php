<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" class="form-control" id="{{$id}}" name='{{$name}}' value="{{$model[$name] ?? old($name)}}">
    <img id="oldImage" src="{{$model[$name]}}" alt="your image" />
    <img id="previewImage" src="#" alt="your image" />
    {{$slot}}
</div>
