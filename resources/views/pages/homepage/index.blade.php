@extends('template')

@section('content')
    @include('pages.homepage.partials.news_slider')
    <div class="wf100 mt-m90 pb90">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 hompeage__middle-content-col">
                    @include('pages.homepage.partials.table_and_fixtures')
                </div>
                <div class="col-lg-5 col-md-5 my-auto">
                    @include('pages.homepage.partials.fixtures_and_results')
                </div>
            </div>
        </div>
    </div>
@endsection
