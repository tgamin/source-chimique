<header class="page-header">
    <div class="header-top d-flex justify-content-end pt-2 px-3 container">
        <a rel="nofollow" class="" target="_blank" href="https://www.linkedin.com/company/source-chimiques">
            <svg xmlns="http://www.w3.org/2000/svg" height="15px"
                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <style>
                    svg {
                        fill: #ffffff
                    }
                </style>
                <path
                    d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z">
                </path>
            </svg>
        </a>
        {{--old lang btn 
        <div class="dropdown lang-btn">
            <a class="p-0 m-0 text-start btn dropdown-toggle text-white border-0" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ LaravelLocalization::getCurrentLocaleNative() }}
            </a>
            <ul class="dropdown-menu lang-dropdown">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="px-2">
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div> --}}
        <ul class="lang d-inline-block mb-0">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="lang-li">
                    <a class="text-white text-uppercase px-1 @if (app()->getLocale() == $localeCode) font-weight-bold text-underline @endif "
                        rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $localeCode }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
    <nav class="navbar container navbar-dark navbar-expand-lg bg-body-tertiary bg-transparent">
        <a class="navbar-brand" href="/"><img class="logo" src="/img/logo-mono.png" alt="Source Chimiques logo"
                {{-- width="" --}}></a>
        <button class="navbar-toggler burger-menu" type="button" data-toggle="collapse" data-bs-toggle="offcanvas"
            data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-content offcanvas-end" tabindex="-1" id="navbarOffcanvasLg"
            aria-labelledby="navbarOffcanvasLgLabel">

            <ul class="navbar-nav mt-4 mt-md-0 justify-content-end">
                {{ menu('main', 'partials.menu') }}
                <div class="dropdown lang-btn side-lang pt-2">
                    {{-- old lang button
                        <a class="nav-link text-start btn dropdown-toggle border-0 text-black-50" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </a>
                    <ul class="dropdown-menu lang-dropdown">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="px-2">
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul> --}}
                    <ul>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="lang-li">
                                <a class="text-uppercase px-1 @if (app()->getLocale() == $localeCode) font-weight-bold text-underline @endif "
                                    rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $localeCode }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </ul>

        </div>

        {{-- <ul class="side-lang navbar-nav">
            <div class="dropdown lang-btn">
                <a class="nav-link btn dropdown-toggle border-0 text-black-50" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ LaravelLocalization::getCurrentLocaleNative() }}
                </a>
                <ul class="dropdown-menu lang-dropdown">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="px-2">
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </ul> --}}
    </nav>
</header>
