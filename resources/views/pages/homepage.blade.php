@extends('template')

@section('content')
    <div class="rs-lates-news pt-195 md-pt-160 sec-bg pb-100 md-pb-80">
        <div class="container">
            @include('pages.partials.news')
        </div>
    </div>
    <div class="couter-and-upcomming pt-100 md-pt-80 mb-30">
        <div class="container">
            @include('pages.partials.fixturesAndTable')
        </div>
    </div>
    <div class="rs-match-result style1 nav-style pb-100 md-pb-80">
        <div class="container">
            @include('pages.partials.results')
        </div>
    </div>
    <div class="rs-gallery sec-bg style1 pt-92 pb-100 md-pt-72 md-pb-80">
        <div class="container">
            @include('pages.partials.instagram')
        </div>
    </div>
@endsection
