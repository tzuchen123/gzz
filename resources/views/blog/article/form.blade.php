@extends('layouts.main')

@section('css')
<style>
.ck-editor__editable {
    min-height: 500px !important;
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

@component('layouts.component.form.textarea')
@slot('model', $model)
@slot('row', 20)
@slot('name', 'content')
@slot('id', 'article-content')
@slot('label', '文章內容')
@endcomponent


@component('layouts.component.form.image')
@slot('model', $model)
@slot('name', 'image')
@slot('id', 'image')
@slot('label', '文章縮圖')
@endcomponent


@component('layouts.component.form.dropdown')
@slot('options', $catagories)
@slot('model', $model)
@slot('id', 'catagory_id')
@slot('name', 'catagory_id')
@slot('label', '文章分類')
@endcomponent
<br>

@endcomponent


@endsection


@section('script')
<script type="text/javascript" src="{{ URL::asset('js/ckeditor.js') }}"></script>

<script>
  ClassicEditor
      .create( document.querySelector( '#article-content' ) )
      .catch( error => {
          console.error( error );
      } );
</script>



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
  var newsPicId = $(this).attr('id');

  var msg = "此一動作會刪除資料庫中的圖片！\n請問是否刪除？";
  if (confirm(msg)==true){
  $.ajax({
    type:'POST',
    url:'/newsPic/delete',
    data:{newsPicId:newsPicId 
        },
    success:function(res){
      console.log(res);
      $(".old_img").load(location.href + " .old_img");
    }
  });
  }
});

</script>



@endsection