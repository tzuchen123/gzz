@extends('layouts.main')

@section('content')




@component('layouts.component.form.form')


@slot('action', $action)


@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'title')
@slot('id', 'title')
@slot('label', '標題')
@endcomponent

@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'subtitle')
@slot('id', 'subtitle')
@slot('label', '副標')
@endcomponent

@component('layouts.component.form.input')
@slot('model', $model)
@slot('name', 'solgan')
@slot('id', 'solgan')
@slot('label', '促銷語')
@endcomponent

@component('layouts.component.form.image')
@slot('model', $model)
@slot('name', 'image')
@slot('id', 'image')
@slot('label', '圖片')
@endcomponent


{{-- 
@component('layouts.component.form.image')
@slot('model', $model)
@slot('name', 'image')
@slot('id', 'image')
@slot('label', '圖片')
@endcomponent 
--}}


@endcomponent



@endsection
{{-- 

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

@endsection --}}


@include('layouts.script.imagePreview')

