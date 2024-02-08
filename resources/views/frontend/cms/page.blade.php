
{{-- @if ($page->slug == 'actualites')

    @include('cms.actualites.actualites_card')

@endif --}}

{{-- @if ($page->type == "solution") --}}
    <div class="container">
        <h1 class="title text-center my-5">  Ils nous font confiance</h1>
    </div>
    @include('components.references')
{{-- @endif --}}

@include('components.activites')

@include('components.partenaire')

@include('components.actualites_slider')