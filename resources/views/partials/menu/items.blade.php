@foreach($items as $item)
    @if($item->divider)
        <li class="nav-header">{{ $item->title }}</li>
    @else
        <li {!! $item->attributes() !!}>
            @if($item->link)
                <a @if($item->hasChildren()) @if($item->url() != url('')) href="{{$item->url()}}"  @else href="#" @endif @else href="{{ $item->url() }}" @endif>
                    {!! $item->title !!}
                    @if($item->hasChildren()) <b class="caret"></b> @endif
                </a>
            @else
                {{$item->title}}
            @endif
            @if($item->hasChildren())
                <ul class="sub-menu">
                    @foreach($item->children() as $child)
                        <li {!! $child->attributes() !!}><a href="{{ $child->url() }}">{!! $child->title !!}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endif
@endforeach


