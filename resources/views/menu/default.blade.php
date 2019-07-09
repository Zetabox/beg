<ul class="nav navbar-nav navbar-right">
@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
//dd($items);
@endphp

@foreach ($items as $item)

    @php
    
        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $isActive = null;
        $styles = null;
        $icon = null;

        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }

        // Check if link is current
        if(url($item->link()) == url()->current()){
            $isActive = 'active';
        }

        // Set Icon
        if(isset($options->icon) && $options->icon == true){
            $icon = '<i class="' . $item->icon_class . '"></i>';
        }

    @endphp

    <li class="dropdown {{ $isActive }}">
        <a href="{{ url($item->link()) }}" target="{{ $item->target }}" >{{ $item->title }} <i class="fa fa-angle-down"></i></a>
        @if(!$originalItem->children->isEmpty())
            @include('menu.submenu', ['items' => $originalItem->children])
        @endif
    </li>
@endforeach
</ul>