@extends('layouts.master')
@section('title', 'Kritik')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Kritik</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('kritik.store', $film[0]->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">User</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control"
                                placeholder="Enter Judul Film" value="{{ $film[0]->judul }}" disabled>
                        </div>
                        <input type="hidden" name="film_id" value="{{ $film[0]->id }}">
                        <div class="form-group">
                            <label for="content">Comment</label>
                            <input type="text" name="content" id="content" class="form-control"
                                placeholder="Enter Coment">
                        </div>
                        <div class="form-group">
                            <label for="point">Rating</label>
                            <input type="text" name="point" id="point" class="form-control"
                                placeholder="Enter Point">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
