<form method="POST" action="{{$action}}" enctype="multipart/form-data">
    @csrf

    @if( !isCreate() )
    @method('put')
    @endif

    {{$slot}}
    {{-- <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div> --}}
    {{-- <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
