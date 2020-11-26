@extends('layouts.amaivos')

@section('content')
    <main class="inside">
        <div class="banner"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 pb-5 order-1 order-lg-0">
                    @include('amaivos.volunteer._about')
                </div>
                <div class="col-12 col-lg-6">
                    @include('amaivos.volunteer._form')
                </div>
            </div>
        </div>
    </main>
@endsection 