@extends('template')

@section('title') Administracija – {{ env('APP_TITLE') }}@endsection

@section('content')

    <div class="rs-board-staff pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="title-style mb-50 md-mb-30">
                <h2 class="margin-0 uppercase">Administracija</h2>
                <span class="line-bg y-b left-line pt-10"></span>
            </div>
            <div class="staf-wrap">
                <ul class="staf-area" style="margin-block-start: 0;">
                    <li class="staff-item">
                        <div class="item-wrap">
                            <div class="staff-img">
                                <img src="{{ asset('images/board-staff/1.jpg') }}" alt="">
                            </div>
                            <div class="staff-desc">
                                <div class="inner-desc">
                                    <h3 class="staff-title">Žydrūnas Lukošiūnas</h3>
                                    <h4 class="staff-sub">Direktorius</h4>
                                    <span class="sub1"><i class="flaticon-phone"></i> +37062491433</span>
                                    <span class="sub2"><i class="flaticon-email"></i> sebestinas.m@gmail.com</span>
                                    <p class="margin-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                        commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                        dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                        pellentesque.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="staff-item">
                        <div class="item-wrap">
                            <div class="staff-img">
                                <img src="{{ asset('images/board-staff/2.jpg') }}" alt="">
                            </div>
                            <div class="staff-desc">
                                <div class="inner-desc">
                                    <h3 class="staff-title">Rimantas Kantaravičius</h3>
                                    <h4 class="staff-sub">FA „Dainava“ vadovas</h4>
                                    <span class="sub1"><i class="flaticon-phone"></i> +37062491433</span>
                                    <span class="sub2"><i class="flaticon-email"></i> sebestinas.m@gmail.com</span>
                                    <p class="margin-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                        commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                        dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                        pellentesque.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection