<header class="page-header">

    <nav class="navbar container navbar-expand-lg bg-transparent">
        <a class="navbar-brand" href="/"><img class="logo" src="/img/logo-mono.png" alt="Source Chimiques logo"
                width=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end d-flex row" id="navbarSupportedContent">
            <div class="header-top">
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a rel="nofollow" class="nav-link px-2" target="_blank"
                                href="https://www.linkedin.com/company/source-chimiques">
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
                        </li>

                        <div class="dropdown lang-btn">
                            <a class="nav-link btn dropdown-toggle text-white border-0" href="#" role="button"
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
                    </ul>
                </div>
            </div>


            <ul class="navbar-nav mr-auto justify-content-end">
                {{ menu('main', 'partials.menu') }}
            </ul>
        </div>

        <ul class="side-lang navbar-nav">
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
        </ul>
    </nav>
</header>
