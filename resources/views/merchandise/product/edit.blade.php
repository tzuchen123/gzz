@extends('layouts.main')

@section('css')
<style>
  .oldPictures {
    display: flex;
    flex-wrap: wrap;


  }

  .oldPicture {
    display: flex;
    flex-direction: column;
    align-items: center;

  }

  .btn-danger {
    margin-top: 5px;
    margin-bottom: 5px;
  }
</style>
@endsection

@section('content')


@component('layouts.component.form.form')


@slot('action', $action)


@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'title')
@slot('id', 'title')
@slot('label', '標題')
@endcomponent

@component('layouts.component.form.dropdown')
@slot('options', $sorts)
@slot('model', $model)
@slot('id', 'sort_id')
@slot('name', 'sort_id')
@slot('label', '商品分類')
@endcomponent

@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'price')
@slot('id', 'price')
@slot('label', '價格')
@endcomponent

@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'amount')
@slot('id', 'amount')
@slot('label', '數量')
@endcomponent

@component('layouts.component.form.textarea')
@slot('model', $model)
@slot('name', 'description')
@slot('id', 'description')
@slot('label', '商品描述')
@endcomponent

@component('layouts.component.form.image')
@slot('model', $model)
@slot('name', 'image')
@slot('id', 'image')
@slot('label', '主要圖片')
@endcomponent


@component('layouts.component.form.picture')
@slot('name', 'picture')
@slot('id', 'picture')
@slot('label', '輪播圖片')
@endcomponent


<div class="form-group">
  <label for="oldPictures">原上傳照片</label>
  <div class="oldPictures" style="width:100%; height:300px; overflow:scroll;">
    @foreach ($oldPictures as $picture)
    <div class="oldPicture" id='oldPicture'>
      <img src="{{$picture->picture}}" alt="" srcset="" style="height:300px; width:50%; min-width:300px;"
        id="{{$picture->id}}">
      <div class="btn btn-danger" style="width:35%; height:20%;" id="{{$picture->id}}">刪除</div>
    </div>
    @endforeach
  </div>
</div>



<br>

@endcomponent



@endsection


@section('script')
<script>
  function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
  $('#previewImage').attr('src', e.target.result);
  $('#oldImage').addClass('d-none')

}

reader.readAsDataURL(input.files[0]); // convert to base64 string
}
}

$("#image").change(function() {
readURL(this);
});



$("#picture").change(function(){
  $("#previewPicture").html(""); // 清除預覽
  readURLs(this);
});
function readURLs(input){
  if (input.files && input.files.length >= 0) {
    for(var i = 0; i < input.files.length; i ++){
      var reader = new FileReader();
      reader.onload = function (e) {
        var img = $("<img width='300' height='200'>").attr('src', e.target.result);
        $("#previewPicture").append(img);
      }
      reader.readAsDataURL(input.files[i]);
    }
  }
}



$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("body").delegate(".btn-danger", "click", function(){
  // $('#old_img_inside').on('click','.btn-danger',function(){
  var pictureId = $(this).attr('id');
    console.log(pictureId);
  var msg = "此一動作會刪除資料庫中的圖片！\n請問是否刪除？";
  if (confirm(msg)==true){
  $.ajax({
    type:'POST',
    url:'/delete/picture',
    data:{pictureId:pictureId 
        },
    success:function(res){
      console.log(res);
      $(".oldPictures").load(location.href + " .oldPictures");
    }
  });
  }
});

</script>

@endsection