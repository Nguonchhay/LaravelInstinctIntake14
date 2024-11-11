@extends('layouts.app')

@section('content')
    <div class="page-title light-background">
      <div class="container">
        <h1>Administrator Site</h1>
      </div>
    </div>

    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4  justify-content-between">
          <div class="col-xl-2">
            <span class="about-meta">Site Menu</span>
            <div class="row feature-list-wrapper">
                <div class="col-md-12">
                    @include('includes.backends.menu')
                </div>
            </div>
          </div>

          <div class="col-xl-9" data-aos="fade-up" data-aos-delay="300">
            <h2>Edit Category</h2>
            <form action="{{ route('backends.categories.update', $category->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" required class="form-control" id="title" name="title" value="{{ $category->title }}">
              </div>
              <a href="{{ route('backends.categories.index') }}" class="btn btn-default">Back to list</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>


@endsection