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
            <h2>Services</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">
                            @can('createAndStore')
                              <a href="{{ route('backends.services.create') }}">+ New</a>
                            @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <th scope="row">{{ $service->id }}</th>
                            <td>{{ $service->category->title }}</td>
                             <td>{{ $service->title }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('backends.services.show', $service->id) }}" class="btn btn-primary">Show</a>
                                    
                                    @can('editAndUpdate')
                                      <a href="{{ route('backends.services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                    @endcan

                                    @can('destroy')
                                      <button type="button" class="btn btn-danger">Delete</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
          </div>
        </div>
      </div>
    </section>


@endsection