@extends('layouts.master', ['page_title' => __('page_title.about_title')])

@section('main')
<main>

    @include('partial.page-title', [
    'image' => asset('assets/images/banner-about.jpg'),
    ])

    <div class="container mt-3">
        <h1 class="title text-center my-5">Carrières</h1>
    </div>

    <section class="my-5">

        <div class="container-fluid">
            <div class="row about">
                <div class="offset-1 col-md-5  p-5 ps-0 about-content">
                    <form>
                        <div class="row ">
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="fullName"  placeholder="{{__('apply.nom')}}">
                                <label for="floatingInput">{{__('apply.nom')}}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="fullName"  placeholder="{{__('apply.prenom')}}">
                                <label for="floatingInput">{{__('apply.prenom')}}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail">
                                <label for="floatingInput">E-mail</label>
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="tel" class="form-control" id="phone"  placeholder="{{__('apply.telephone')}}">
                                <label for="floatingInput">{{__('apply.telephone')}} </label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="fullName"  placeholder="{{__('apply.ville')}}">
                                <label for="floatingInput">{{__('apply.ville')}}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="objet"  placeholder="{{__('apply.niveau_education')}}">
                                <label for="floatingInput">{{__("apply.niveau_education")}}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-6 mb-3">
                                <input type="text" class="form-control" id="fullName"  placeholder="{{__('apply.annees_experience')}}">
                                <label for="floatingInput">{{__('apply.annees_experience')}}</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="col-md-6 mb-3   ">
                                <input type="file" class="form-control"  placeholder="{{__('apply.joindre_cv')}}">
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-floating  col-md-12 mb-3 ">
                                <textarea style="height: 100px" name="message" id="floatingTextarea" class="form-control" placeholder="Message"></textarea>
                                <label for="floatingTextarea">Message</label>
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                                
                        </div>
                        
                        <button type="submit" class="btn btn-primary text-white contact-button">{{__("contact.contatc_button")}}</button>
                    </form>
                </div>
                <div class="col-md-6 py-3 px-4 img"
                    style="background-image: url({{asset('assets/images/about-2.jpg')}})">
                    {{-- <img src="{{asset('assets/images/about.jpg')}}" class="img-fluid" alt=""> --}}
                    <img src="{{asset('assets/images/slider/slider-after.svg')}}" class="svg-befor-img-left" alt="">
                </div>
            </div>
        </div>
    </section>

</main>
@endsection