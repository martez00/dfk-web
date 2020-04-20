@extends('template')

@section('title') Kontaktai – {{ env('APP_TITLE') }}@endsection

@section('content')

    <!-- Contact Section Start -->
    <div class="rs-contact sec-bg">
        <div class="rs-contact-icon pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
            <div class="container">
                <div class="title-style mb-50 md-mb-30">
                    <h2 class="margin-0 uppercase">Kontaktai</h2>
                    <span class="line-bg y-b left-line pt-10"></span>
                </div>
                <div class="row mb-30">
                    <div class="col-lg-6 col-xs-12 lg-mb-30">
                        <div class="single-icon text-center">
                            <div class="icon-part">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="icon-text">
                                <h3 class="icon-title">Telefonas</h3>
                                <a class="icon-info" @if($team->phone_number) href="tel:{{ $team->phone_number }}" @endif>{{ $team->phone_number ? $team->phone_number : '-' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="single-icon text-center">
                            <div class="icon-part">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="icon-text">
                                <h3 class="icon-title">El. paštas</h3>
                                <a class="icon-info" @if($team->phone_number) href="mailto:{{ $team->email }}" @endif>{{ $team->email ? $team->email : '-' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xs-12 lg-mb-30">
                        <div class="single-icon text-center">
                            <div class="icon-part">
                                <i class="flaticon-send"></i>
                            </div>
                            <div class="icon-text">
                                <h3 class="icon-title">Tinklalapis</h3>
                                <span>{{ $team->website ? $team->website : '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="single-icon text-center">
                            <div class="icon-part">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="icon-text after-none">
                                <h3 class="icon-title">Adresas</h3>
                                <span>{{ $team->address ? $team->address : '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection
