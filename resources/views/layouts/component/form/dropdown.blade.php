<select id="{{$id}}" name="{{$name}}" class="form-control">
 
  <option value="">--- 選擇 {{$label}} ---</option>

  @foreach ($options as $item)
  <option value="{{ $item->id }}" {{ $model->$name == $item->id ? 'selected' : ''}}>{{ $item->title }}</option>
  @endforeach
</select>

{{-- 
<option value="{{ $key }}" {{ (Input::old("title") == $key ? "selected":"") }}>{{ $val }}</option>

@if (Input::old('title') == $key)
      <option value="{{ $key }}" selected>{{ $val }}</option>
@else
      <option value="{{ $key }}">{{ $val }}</option>
@endif --}}