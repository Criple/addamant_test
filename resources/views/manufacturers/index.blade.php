@extends('layouts.main')

@section('content')
    <section class="tires-controls">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Manufacturers list</h2>
                    <a href="{{ route('create_manufacturer') }}" class="btn btn-primary">Создать</a>
                </div>
            </div>
        </div>
    </section>
    </section>
    <section class="manufacturers-table">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($manufacturers as $manufacturer)
                                <tr scope="col">
                                    <td>{{ $manufacturer->id }}</td>
                                    <td>{{ $manufacturer->name }}</td>
                                    <td>
                                        <a href="{{ route('update_manufacturer', ['id' => $manufacturer->id]) }}" class="btn btn-primary">Редактировать</a>
                                        <a href="{{ route('delete_manufacturer', ['id' => $manufacturer->id]) }}" class="btn btn-primary">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('tires_index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

@endsection
