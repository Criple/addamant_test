<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Addamant test</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <section class="main-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Addamant test</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('manufacturer_index') }}" class="btn btn-link">Производители шин</a>
                    <a href="{{ route('model_index') }}" class="btn btn-link">Модели шин</a>
                </div>
            </div>
        </div>
    </section>
    @yield('content')
</body>
</html>
