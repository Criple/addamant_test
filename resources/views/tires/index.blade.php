@extends('layouts.main')

@section('content')
    <section class="tires-controls">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('create_tire') }}" class="btn btn-primary">Создать</a>
                    <form id="xlsx-upload" action="{{ route('tires_import') }}" class="d-inline-block">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="xlsx-file" class="btn btn-primary">Загрузить из *.xlsx</label>
                        <input type="file" id="xlsx-file" name="xlsx-file" class="d-none" />

                    </form>
                    <div class="col-3 d-inline-block">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
    <section class="parsed-tires-table">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Ширина</th>
                            <th scope="col">Профиль</th>
                            <th scope="col">Диаметр</th>
                            <th scope="col">Индекс нагрузки</th>
                            <th scope="col">Индекс скорости</th>
                            <th scope="col">Производитель</th>
                            <th scope="col">Модель</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата изменения</th>
                            <th scope="col">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($validTires as $tire)
                                <tr scope="col">
                                    <td>{{ $tire->id }}</td>
                                    <td>{{ $tire->name }}</td>
                                    <td>{{ $tire->width }}</td>
                                    <td>{{ $tire->profile }}</td>
                                    <td>{{ $tire->diameter }}</td>
                                    <td>{{ $tire->load_index }}</td>
                                    <td>{{ $tire->speed_index }}</td>
                                    <td>@if(isset($tire->manufacturer)) {{ $tire->manufacturer->name }} @endif</td>
                                    <td>@if(isset($tire->tireModel)) {{ $tire->tireModel->name }} @endif</td>
                                    <td>{{ $tire->quantity }}</td>
                                    <td>{{ $tire->price }}</td>
                                    <td>{{ $tire->created_at }}</td>
                                    <td>{{ $tire->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('update_tire', ['id' => $tire->id]) }}" class="btn btn-primary">Редактировать</a>
                                        <a href="{{ route('delete_tire', ['id' => $tire->id]) }}" class="btn btn-primary">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="not-parsed-tires-table">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Ширина</th>
                            <th scope="col">Профиль</th>
                            <th scope="col">Диаметр</th>
                            <th scope="col">Индекс нагрузки</th>
                            <th scope="col">Индекс скорости</th>
                            <th scope="col">Производитель</th>
                            <th scope="col">Модель</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата изменения</th>
                            <th scope="col">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notValidTires as $tire)
                            <tr scope="col">
                                <td>{{ $tire->id }}</td>
                                <td>{{ $tire->name }}</td>
                                <td>{{ $tire->width }}</td>
                                <td>{{ $tire->profile }}</td>
                                <td>{{ $tire->diameter }}</td>
                                <td>{{ $tire->load_index }}</td>
                                <td>{{ $tire->speed_index }}</td>
                                <td>@if(isset($tire->manufacturer)) {{ $tire->manufacturer->name }} @endif</td>
                                <td>@if(isset($tire->tireModel)) {{ $tire->tireModel->name }} @endif</td>
                                <td>{{ $tire->quantity }}</td>
                                <td>{{ $tire->price }}</td>
                                <td>{{ $tire->created_at }}</td>
                                <td>{{ $tire->updated_at }}</td>
                                <td>
                                    <a href="{{ route('update_tire', ['id' => $tire->id]) }}" class="btn btn-primary">Редактировать</a>
                                    <a href="{{ route('delete_tire', ['id' => $tire->id]) }}" class="btn btn-primary">Удалить</a>
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
