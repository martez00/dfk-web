@extends('template')

@section('title') Istorija – {{ env('APP_TITLE') }}@endsection

@section('content')
    <!-- About Section Start -->
    <div class="rs-about sec-bg pt-180 md-pt-160 pb-100 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Istorija</h2>
                        <span class="line-bg y-b left-line pt-10"></span>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 md-mb-30">
                    <div class="about-img">
                        <img src="{{ asset('images/pages/history/1.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-7 pl-40 col-padding-md">
                    <div class="about-wrap">
                        <p class="title-color mb-10">Alytaus „Dainava“ – vienas seniausių ir žinomiausių Lietuvos
                            futbolo
                            klubų. Jį 1935 m. Alytuje įkūrė Lietuvos šaulių sąjungos vyrai.</p>
                        <p class="title-color mb-10">Per daugelį metų „Dainava“ pelnė ne tik alytiškių, bet ir viso
                            regiono –
                            Dzūkijos – meilę.
                            1975 m. Alytaus „Dainava“ iškovojo Lietuvos čempionato auksą – kol kas patį didžiausią klubo
                            laimėjimą.</p>
                        <p class="title-color mb-10">2003 m. „Dainava“ iširo ir buvo atkurta tik 2011 m. Atgimęs
                            legendinis
                            klubas prikėlė
                            Alytaus sporto gyvenimą ir reanimavo Lietuvos futbolo kultūrą – pušų apsuptyje stūksantis
                            „Dainavos“ stadionas buvo pati populiariausia futbolo arena Lietuvoje – į ją rinkosi
                            daugiausia žiūrovų.</p>
                        <p class="title-color mb-10">Laikui bėgant Alytaus „Dainavą“ apgaubė skandalų debesys, o 2015 m.
                            pabaigoje klubui buvo
                            iškelta bankroto byla – klubas tapo neveiksnus.</p>
                        <p class="title-color mb-10">Alytaus futbolo bendruomenė, kartu su ištikimiausiais sirgaliais –
                            ultrų
                            bendruomene „Dzūkų
                            tankai“, nusprendė nelaukti ir padėti pamatus legendinio Alytaus klubo tradicijas tęsiančiai
                            komandai – Dzūkijos futbolo klubui (DFK) „Dainava“.</p>
                        <p class="title-color mb-10">DFK „Dainava“ tikslas – tęsti mylimo, 1935 m. įkurto, klubo
                            tradiciją, o
                            laikui bėgant
                            atgauti klubui priklausiusias regalijas.</p>
                        <ul class="stylelisting inner-about">
                            <li>1935 m. įkuriamas Alytaus šaulių sporto klubas FK „Dainava“.</li>
                            <li>1975 m. FK „Dainava“ – Lietuvos čempionė.</li>
                            <li>2003 m. FK „Dainava“ išnyko iš Lietuvos futbolo žemėlapio.</li>
                            <li>2011 m. FK „Dainava“ sugrįžta į Lietuvos futbolo A lygą.</li>
                            <li>2015 m. Klubui FK „Dainava“ iškeliama bankroto byla.</li>
                            <li>2016 m. Ultrų bendruomenės „Dzūkų tankai“ iniciatyva įkuriamas Dzūkijos futbolo klubas
                                „Dainava“.
                            </li>
                            <li>2018 m. DFK „Dainava“ – Pirmos lygos sidabro medalių laimėtoja.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
