<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" class="form-control" id="{{$id}}" name='{{$name}}' value="{{$model[$name] ?? old($name)}}">
    <img id="oldImage" src="{{$model[$name]}}" alt="your image" style="width:100%; max-height: 600px"/>
    <img id="previewImage" src="#" alt="your image" style="width:100%; max-height: 600px" />
    {{$slot}}
</div>
