@extends('layouts.main')

@section('content')

    <section class="tires-create-form">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>Update a Tire</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update_tire_action') }}">
                        @csrf
                        <input type="hidden" name="tire_id" value="{{ $tire->id }}" />
                        <div class="mb-3 row">
                            <label for="name" class="col-2 col-form-label">Tire title:</label>
                            <div class="col-10">
                                <input type="text" name="name" value="{{ $tire->name }}" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="width" class="col-2 col-form-label">Tire width:</label>
                            <div class="col-10">
                                <input type="number" name="width" value="{{ $tire->width }}" class="form-control" id="width">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="profile" class="col-2 col-form-label">Tire profile:</label>
                            <div class="col-10">
                                <input type="number" name="profile" value="{{ $tire->profile }}" class="form-control" id="profile">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="diameter" class="col-2 col-form-label">Tire diameter:</label>
                            <div class="col-10">
                                <input type="text" name="diameter" value="{{ $tire->diameter }}" class="form-control" id="diameter">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="load_index" class="col-2 col-form-label">Tire load index:</label>
                            <div class="col-10">
                                <input type="number" name="load_index" value="{{ $tire->load_index }}" class="form-control" id="load_index">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="speed_index" class="col-2 col-form-label">Tire speed index:</label>
                            <div class="col-10">
                                <input type="text" name="speed_index" value="{{ $tire->speed_index }}" class="form-control" id="speed_index">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="manufacturer_id" class="col-2 col-form-label">Tire manufacturer:</label>
                            <div class="col-10">
                                <select name="manufacturer_id" class="form-control" id="manufacturer_id">
                                    <option value="0">Не выбрано</option>
                                    @foreach($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if(isset($tire->manufacturer) && $manufacturer->id == $tire->manufacturer->id) selected @endif >{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="model_id" class="col-2 col-form-label">Tire model:</label>
                            <div class="col-10">
                                <select name="model_id" class="form-control" id="model_id">
                                    <option value="0">Не выбрано</option>
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}" @if(isset($tire->tireModel) && $model->id == $tire->tireModel->id) selected @endif >{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quantity" class="col-2 col-form-label">Tire quantity:</label>
                            <div class="col-10">
                                <input type="number" name="quantity" value="{{ $tire->quantity }}" class="form-control" id="quantity">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="price" class="col-2 col-form-label">Tire price:</label>
                            <div class="col-10">
                                <input type="number" name="price" value="{{ $tire->price }}" class="form-control" id="price">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="parsed_valid" class="col-2 col-form-label">Tire parsed valid:</label>
                            <div class="col-10">
                                <select name="parsed_valid" class="form-control" id="parsed_valid">
                                    <option value="1" @if($tire->parsed_valid == 1) selected @endif >Parsed valid</option>
                                    <option value="0" @if($tire->parsed_valid == 0) selected @endif >Parsed NOT valid</option>
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mb-3">Update Tire</button>
                    </form>





                    <a href="{{ route('tires_index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

@endsection
