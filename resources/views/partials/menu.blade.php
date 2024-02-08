@foreach ($items as $menu_item)
    @php
        $originalItem = $menu_item;
        $submenu = $originalItem->children;
    @endphp

    @if (!$submenu->isEmpty())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle header-link" href="{{ $menu_item->link() }}" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ $menu_item->title }}
            </a>
            <ul class="dropdown-menu">
                @foreach ($submenu as $sub_item)
                    <li><a class="dropdown-item submenu-link" href="{{ $sub_item->url }}">{{ $sub_item->title }} </a></li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link header-link" aria-current="page"
                href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
        </li>
    @endif
@endforeach
