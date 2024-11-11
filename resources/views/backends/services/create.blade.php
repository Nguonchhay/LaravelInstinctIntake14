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
            <h2>New Service</h2>
            <form action="{{ route('backends.services.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="category" class="form-label">Category *</label>
                <select required class="form-control" id="category" name="category_id">
                  @foreach ($categories as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" required class="form-control" id="title" name="title">
              </div>

              <div class="mb-3">
                <label for="icon" class="form-label">Icon *</label>
                <input type="text" required class="form-control" id="icon" name="icon">
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/svg, image/webp, image/gif">
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>


@endsection