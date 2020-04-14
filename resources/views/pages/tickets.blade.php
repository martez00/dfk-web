@extends('template')

@section('title') Bilietai – {{ env('APP_TITLE') }}@endsection

@section('content')
    <!-- About Section Start -->
    <div class="rs-about sec-bg pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Bilietai</h2>
                        <span class="line-bg y-b left-line pt-10"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="about-wrap">
                        <p class="title-color mb-10">
                            Visos DFK „Dainavos“ rungtynės Alytaus miesto stadione – nemokamos. <b>Tikimės sulaukti kuo gausesnio Jūsų palaikymo!</b></p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-30">
                <div class="col-lg-6 col-xs-12 md-mb-30">
                    <div class="about-img">
                        <img src="https://scontent.fvno2-1.fna.fbcdn.net/v/t1.0-9/74209807_1418470151633610_4937962584981635072_o.jpg?_nc_cat=105&_nc_sid=cdbe9c&_nc_ohc=mddwN4Jd1TEAX86Hsiz&_nc_ht=scontent.fvno2-1.fna&oh=4f3f94a6b28d8a5a02de82214a93c651&oe=5EB9C0A0">
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="about-img">
                        <img src="https://scontent.fvno2-1.fna.fbcdn.net/v/t1.0-9/68596751_1358391064308186_489105726002692096_o.jpg?_nc_cat=107&_nc_sid=cdbe9c&_nc_ohc=sK4FuqYC21IAX9yFl3P&_nc_ht=scontent.fvno2-1.fna&oh=ea8371dd42e1ba63dd6b66bbb4b3c238&oe=5EBB41FD">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
