@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
@endsection

@section('content')

    <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>

    @include('components.section',[$page])

    {{-- <section class="mot left-img container d-flex">
        <div class="row">
            <div class="img-container col-md-6 d-flex justify-content-center">
                <img class="sec-img" src="/img/img4.png" alt="">
            </div>
            <div class="col-md-6">
                <h1 class="section-title">Pendant près de trois décennies, nous nous sommes engagés à offrir à nos clients
                    la meilleure qualité
                </h1>
                <div class="paragraph-container">
                    <p class="paragraph">
                        Pendant près de trois décennies, nous nous sommes engagés à offrir à nos clients la meilleure
                        qualité, ce qui nous a permis de devenir une partie essentielle de leur vie quotidienne. Après de
                        nombreuses années de travail acharné, notre entreprise est aujourd'hui en tête du marché, proposant
                        une gamme complète de produits de nettoyage et d'hygiène.
                    </p>

                    <p class="paragraph">
                        Chez Source Chimiques, nous croyons fermement que la clé du succès de toute entreprise réside dans
                        la priorité accordée aux besoins et aux attentes de ses clients. nos gammes ont été élaborées pour
                        répondre de manière complète, tant aux besoins exprimés qu'aux attentes sous-jacentes de divers
                        consommateurs, s'alignant ainsi parfaitement avec leurs exigences.
                    </p>

                    <p class="paragraph">
                        Grâce à notre expertise et à notre agilité pour s'adapter rapidement aux évolutions des tendances du
                        marché, notre entreprise se positionne en tant que pionnière dans son secteur.
                    </p>

                    <p class="paragraph">
                        En collaborant avec un vaste réseau de partenaires internationaux, nous mettons constamment nos
                        efforts dans la fabrication de produits efficaces, en utilisant les technologies les plus avancées.
                        Ce faisant, nous cherchons à améliorer les conditions de travail de nos employés tout en optimisant
                        notre productivité.
                    </p>

                    <p class="paragraph">
                        Chez Source Chimiques, notre engagement à respecter notre objectif de créer et d'innover pour
                        améliorer la qualité de vie de nos clients, à la fois aujourd'hui et pour les générations à venir,
                        demeure inébranlable.
                    </p>
                    <p class="paragraph">
                        Notre engagement à révolutionner le secteur des détergents et des produits d'hygiène trouve son
                        point de départ dans nos marques et leur variété de gammes. C'est cet engagement qui donne un sens
                        quotidien au travail de nos collaborateurs, les motivant à améliorer et à développer nos produits
                        afin qu'ils demeurent abordables et accessibles quotidiennement dans tout le Maroc, tout en
                        répondant aux besoins de nos partenaires en Afrique.
                    </p>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
