@foreach ($items as $menu_item)
    <li><a href="{{ $menu_item->link() }}">{{ $menu_item->getTranslatedAttribute('title') }}</a></li>
@endforeach