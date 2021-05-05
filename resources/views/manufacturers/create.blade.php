@extends('layouts.main')

@section('content')

    <section class="tires-create-form">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>Create tire manufacturer</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('create_manufacturer_action') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-2 col-form-label">Manufacturer title:</label>
                            <div class="col-10">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mb-3">Create manufacturer</button>
                    </form>

                    <a href="{{ route('manufacturer_index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

@endsection
