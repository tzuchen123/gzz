<div class="custom-control custom-checkbox mb-2">
    <input
        model-id="{{$model->id}}"
        name="{{$name}}"
        type="checkbox"
        class="custom-control-input {{$name}}"
        id="{{$name}}{{$model->id}}"
        route="{{route($route, ['none'])}}"
        {{($model[$name])?'checked':''}}>
    <label class="custom-control-label" for="{{$name}}{{$model->id}}"></label>
</div>
