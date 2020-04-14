@extends('template')

@section('title') Atributika – {{ env('APP_TITLE') }}@endsection

@section('content')
    <!-- About Section Start -->
    <div class="rs-about sec-bg pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Atributika</h2>
                        <span class="line-bg y-b left-line pt-10"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="about-wrap">
                        <p class="title-color mb-10">
                            Komandos atributikos galite įsigyti kiekvieną namų rungtynių dieną Alytaus miesto stadiono kasose arba susisiekę el.paštu dfkdainava@gmail.com.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-30">
                <div class="col-lg-6 col-xs-12 md-mb-30">
                    <div class="about-img">
                        <img src="http://dfkdainava.com/wp-content/uploads/49947863_1081702895363420_8918234573481967616_n.jpg" style="border:1px solid rgba(128,128,128,0.29);">
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="about-img">
                        <img src="http://dfkdainava.com/wp-content/uploads/2016/03/13412985_1610054925974585_93769655989405029_n.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
