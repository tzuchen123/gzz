@extends('layouts.main')

@section('content')




@component('layouts.component.form.form')


@slot('action', $action)


<div class="form-group row">
  <label for="images" class="col-sm-2 col-form-label">輪播照片</label>
  <div class="col-sm-10">
    <input type="file" class="form-control" id="images" name="images[]" required multiple>
    <img id="oldImage" src=" {{ $model->image ?? '' }} " alt="your image" />
    <img id="previewImage" src="#" alt="your image" style="width:100%; max-height: 600px" />
  </div>
</div>


@component('layouts.component.form.dropdown')
@slot('options', $sorts)
@slot('model', $model)
@slot('id', 'sort_id')
@slot('name', 'sort_id')
@slot('label', '商品分類')
@endcomponent


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
</script>

@endsection