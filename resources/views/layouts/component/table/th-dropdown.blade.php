{{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </div>
  
   --}}
<th scope="col" width="{{$width ?? ''}}">
    <select id="{{$id}}" name="{{$name}}" class="form-control">
 
        <option value="">--- 選擇 {{$label}} ---</option>
      
        @foreach ($options as $item)
        <option value="{{ $item->id }}" {{ $model->$name == $item->id ? 'selected' : ''}}>{{ $item->title }}</option>
        @endforeach
      </select>
</th>
