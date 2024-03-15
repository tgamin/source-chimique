@foreach ($items as $menu_item)
    @php
        $originalItem = $menu_item;
        $submenu = $originalItem->children;
    @endphp

    @if (!$submenu->isEmpty())
        <li class="nav-item dropdown li-link">
            <a class="nav-link dropdown-toggle header-link" href="{{ $menu_item->link() }}" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ $menu_item->getTranslatedAttribute('title') }}
            </a>
            <ul class="dropdown-menu">
                @foreach ($submenu as $sub_item)
                    <li><a class="dropdown-item submenu-link" href="{{ $sub_item->url }}">{{ $sub_item->getTranslatedAttribute('title') }} </a></li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-item li-link">
            <a class="nav-link header-link" aria-current="page"
                href="{{ $menu_item->link() }}">{{ $menu_item->getTranslatedAttribute('title') }}</a>
        </li>
    @endif
@endforeach
