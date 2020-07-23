@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('short_url'))
                            <h5 class="card-title">Generated</h5>
                            <p class="card-text">
                            <div class="form-group">
                                <input class="form-control" disabled value="{{ url(session('short_url')) }}">
                            </div>
                            <a class="btn btn-primary" href="{{ session('short_url') }}">Перейти</a>
                            </p>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('home-store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUrl">Введите URL</label>
                                <input type="url" name="url" class="form-control" id="exampleInputUrl"
                                       placeholder="https://google.com" value="{{ old('url') }}" required>
                                <small id="exampleInputUrl" class="form-text text-muted">We'll never share your email
                                    with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUserShortUrl">Свое сокращение</label>
                                <input type="text" name="user_short_url" class="form-control" id="exampleInputUserShortUrl"
                                       value="{{ old('user_short_url') }}" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDate">Выберите дату удаления ссылки</label>
                                <div class="col-10">
                                    <input class="form-control" name="date" type="date" id="exampleInputDate">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Сократить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
