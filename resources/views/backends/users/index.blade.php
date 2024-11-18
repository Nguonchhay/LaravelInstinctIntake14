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
            <h2>Users</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Name</th>
                        <th scope="col">
                            <a href="">+ New</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
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