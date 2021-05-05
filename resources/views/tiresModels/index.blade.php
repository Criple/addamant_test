@extends('layouts.main')

@section('content')
    <section class="tires-models-controls">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Models list</h2>
                    <a href="{{ route('create_model') }}" class="btn btn-primary">Создать</a>
                </div>
            </div>
        </div>
    </section>
    </section>
    <section class="tires-models-table">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr scope="col">
                                    <td>{{ $model->id }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>
                                        <a href="{{ route('update_model', ['id' => $model->id]) }}" class="btn btn-primary">Редактировать</a>
                                        <a href="{{ route('delete_model', ['id' => $model->id]) }}" class="btn btn-primary">Удалить</a>
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
