@extends('layouts.app')
@section('content')
<div class="jumbotron py-4 bg-white pattered">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">
                <img src="/assets/images/bg-help.svg" alt="" class="w-100">
            </div>
            <div class="col-sm-12 col-md-6 py-4 justify-text-center align-center text-right">
                <div class="py-4"></div>
                <h1 class="mb-0 display-4 text-primary thinner">Yuvathram</h1>
                <h4 class="font-weight-light text-grey">Not just Donating. Helping others Donate.</h4>
                <div class="py-2"></div>
                <a href="" class="btn btn-outline-primary">I want to Donate</a>
                <a href="" class="btn btn-primary">Need Donation</a>
            </div>
        </div>
    </div>
</div>
<div class="py-3"></div>
<section id="find-donors">
    <div class="container">
        <h3 class="text-primary thinner">Search for Donors</h3>
        <home-search></home-search>
    </div>
</section>
<div class="py-3"></div>
@endsection
