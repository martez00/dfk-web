@extends('template')

@section('title') Stadionai – {{ env('APP_TITLE') }}@endsection

@section('content')
    <!-- About Section Start -->
    <div class="rs-about sec-bg pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Stadionai</h2>
                        <span class="line-bg y-b left-line pt-10"></span>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 md-mb-30">
                    <div class="about-img">
                        <img src="https://www.alytusinfo.lt/data/tourism_objects/large/miesto_stadionas__teniso_kortai.jpg">
                    </div>
                </div>
                <div class="col-lg-7 pl-40 col-padding-md">
                    <div class="about-wrap">
                        <h3>Alytaus miesto centrinis stadionas</h3>
                        <p class="title-color mb-10">
                            <b>Adresas:</b> Birutės g. 5, Alytus<br>
                            <b>Kontaktai:</b> (8~315) 75 490<br>
                            <b>Vietų skaičius:</b> 3748<br>
                            <b>Danga:</b> natūrali veja<br>
                            <b>Aikštės dydis:</b> Standartinių matmenų aikštė<br>
                            <b>Atidaryta:</b> 1924 m.<br>
                            <b>Atnaujinimai:</b> 1957-1958, 2007, 2009-2010 m.<br>
                            <b>Savininkas:</b> Alytaus miesto savivaldybė</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-30">
                <div class="col-lg-5 md-mb-30">
                    <div class="about-img">
                        <img src="https://m.alytusplius.lt/sites/default/files/styles/lightbox/public/pagrindin%C4%97.jpg?itok=5gOWFLuL">
                    </div>
                </div>
                <div class="col-lg-7 pl-40 col-padding-md">
                    <div class="about-wrap">
                        <h3>Dainavos progimnazijos stadionas</h3>
                        <p class="title-color mb-10">
                            <b>Adresas:</b> Vilties g. 12, Alytus<br>
                            <b>Danga:</b> dirbtinė veja<br>
                            <b>Aikštės dydis:</b> standartinių matmenų aikštė<br>
                            <b>Savininkas:</b> Dainavos pagr. mokykla<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-30">
                <div class="col-lg-5 md-mb-30">
                    <div class="about-img">
                        <img src="https://aaff.lt/images/stad2.jpg">
                    </div>
                </div>
                <div class="col-lg-7 pl-40 col-padding-md">
                    <div class="about-wrap">
                        <h3>Alytaus apskrities futbolo federacijos stadionas</h3>
                        <p class="title-color mb-10">
                            <b>Adresas:</b> Naujoji g. 2F, Alytus<br>
                            <b>Danga:</b> dirbtinė veja<br>
                            <b>Aikštės dydis:</b> standartinių matmenų aikštė<br>
                            <b>Savininkas:</b> Alytaus apskrities futbolo federacija<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
