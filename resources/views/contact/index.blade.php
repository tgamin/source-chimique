@extends('master')

@section('content')
    {{-- carousel foreach page  --}}
    @php
        $breadcrumbs = collect();
        $page_gallery = $page->gallery;
    @endphp


    @if (!empty($page_gallery))
        {{-- ghan3ayt 3la component carousel dyali o ghansift liha had data --}}
        @include('components.carousel', [
            $breadcrumbs,
            $page,
            'data_banner' => [
                'image' => !empty($page->cover)
                    ? Voyager::image($page->cover)
                    : asset('storage/pages/default.jpg'),
                'title' => '',
                'subtitle' => '',
                'nbr_key' => $page->key_number,
                'video' => $page->video,
                'images' => $page_gallery,
            ],
        ])
        {{-- end of the carousel --}}
    @else
        <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}')">
            <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
        </div>
    @endif

    {{-- <div class="hero-image" style="background-image: url('{{ asset('img/bg-1.png') }}')">
        <img class="waves" src="{{ asset('img/waves.png') }}" alt="">
    </div> --}}

    <section class="bloc-about sp-1 my-5">
        <div class="container">
            <div class="row contact-form">

                <div class="col-md-6 col-lg-6 mr-auto">
                    <div class="row">
                        <img src="{{ asset('img/oni.png') }}" alt="">
                    </div>
                </div>

                <div class="col-md-6  ps-md-5 pt-md-4 cms-block">
                    <h3 class="mb-4 ">Contact formulaire</h3>
                    <form>
                        <div class="row ">
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="fullName"
                                    placeholder="{{ __('contact.input_fullname	') }}">
                                <label class="contact-label" for="floatingInput">{{ __('contact.input_fullname') }}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="E-mail">
                                <label class="contact-label" for="floatingInput">E-mail</label>
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="phone" placeholder="Tel :">
                                <label class="contact-label" for="floatingInput">Tel </label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="objet"
                                    placeholder="{{ __('contact.input_subject') }}">
                                <label class="contact-label" for="floatingInput">{{ __('contact.input_subject') }}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-12 mb-3 ">
                                <textarea style="height: 100px" name="message" id="floatingTextarea" class="form-control" placeholder="Message">
                                    
                                </textarea>
                                <label class="contact-label" for="floatingTextarea">Message</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>

                        </div>

                        <button type="submit"
                            class="btn btn-primary text-white contact-button">{{ __('contact.contatc_button') }}</button>
                    </form>

                </div>

            </div>
        </div>
    </section>
    @include('components.map')
@endsection
