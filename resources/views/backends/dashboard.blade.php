@extends('layouts.app')

@section('content')
    <div class="page-title light-background">
      <div class="container">
        <h1>Administrator Site</h1>
      </div>
    </div>

    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-2">
            <span class="about-meta">Site Menu</span>
            <div class="row feature-list-wrapper">
                <div class="col-md-12">
                    @include('includes.backends.menu')
                </div>
            </div>
          </div>

          <div class="col-xl-9" data-aos="fade-up" data-aos-delay="300">
            <h2>Dashboard</h2>
          </div>
        </div>

      </div>

    </section>


@endsection