<li class="active">
<a href="#{{$name}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span>{{$title}}</span>
    </a>
    <ul class="collapse list-unstyled" id="{{$name}}">
        {{$slot}}
    </ul>
</li>
