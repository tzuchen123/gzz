<div class="form-group ">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" class="form-control" id="{{$id}}" name="{{$name}}[]"  multiple>
    <div id="previewPicture" style="width:100%; height: 300px; overflow:scroll;"></div>
    {{$slot}}
</div>


{{-- <div class="form-group">
    <label for="old_img">原上傳照片</label>
    <div class="old_img" style="width:100%; height: 300px; overflow:scroll;">
        @foreach ($pictures as $pic)
        <div class="old_img_inside" id='old_img_inside'>
            <img src="{{$pic->pic}}" alt="" srcset="" style="height:300px; width:50%; min-width:300px;"
                id="{{$pic->id}}">
            <div class="btn btn-danger" style="width:35%; height:20%;" id="{{$pic->id}}">刪除</div>
        </div>
        @endforeach
    </div>
</div> --}}
{{-- <div class="form-group">
    <label for="picture">圖片集</label>
  
    <div class="custom-file">
        <input id="picture" name="picture[]" type="file" class="custom-file-input img" multiple>
        <label class="custom-file-label" for="picture">Choose file</label>
    </div>
    <div id="previewPicture" style="width:100%; height: 300px; overflow:scroll;" src="{{$model->picture}}"></div>
</div>
--}}