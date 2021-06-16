@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white">

        <div class="text-center">
            <img src="{{asset('img/logo.jpg')}}" class="rounded" alt="..." style="width:250px;height:150px;">
            <p>大切な情報をすべて記憶しましょう。</p>
        </div>

        <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                <div class=" col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                <div class=" col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        

            <div class="form-group row mb-2">
                <div class=" col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                            続行
                    </button>
                </div>
            </div>
        </form>
        </div>

        <div class="form-group row mt-5 mb-4">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-muted" for="remember">
                        情報を 30 日間記憶する
                    </label>
                </div>
            </div>
        </div>

        <div class="w-50 mx-auto mb-5">
            <p class="text-muted text-center">アカウントをお持ちではありませんか？</p>
            <p class="text-center"><a href="{{ route('register') }}" class="text-success">アカウント</a></p>
        </div>
        
        
        </div>
    </div>
</div>



@endsection
