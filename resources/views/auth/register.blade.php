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

        <div class="mb-2">
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-md-right"></label>

                <div class=" col-md-6 border-bottom pb-4">
                    <a href="/login/google" class="btn btn-outline-success w-100 " role="button">
                        Googleで続行
                    </a>
                </div>
            </div>
        </div>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                <div class=" col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メール">

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

            <div class="form-group row">
                <label for="password-confirm" class="col-md-3 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="確認パスワード">
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class=" col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                            続ける
                    </button>
                </div>
            </div>
        </form>
        </div>

        <div class="w-50 mx-auto mb-4">
            <p class="text-muted small">
            アカウントを作成すると、<a href="#" class="text-success">サービス利用規約</a>および<a href="#" class="text-success">プライバシーポリシー</a>に同意したとみなされます。
            </p>
        </div>

        <div class="w-50 mx-auto mb-5">
            <p class="text-muted text-center">既にアカウントをお持ちですか？</p>
            <p class="text-center"><a href="{{ route('login') }}" class="text-success">ログイン</a></p>
        </div>
        
        
        </div>
    </div>
</div>



@endsection
