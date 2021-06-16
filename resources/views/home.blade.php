@extends('layouts.index')

@section('content')
<div class="">
    <div class="row">

        <div class="col-md-3" style="height:800px;">
            <div class="container">
                <div>
                
                </div>

                <div >
                    <h5><i class="fas fa-book mr-2"></i>マイメモnote</h5>
                </div>

                <div class="border-bottom">
                    <div class="d-flex justify-content-end mt-4 mb-3">
                        <div class="mr-2">
                            <form action="{{route('create')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="title" value="新規テキスト">
                            <input type="hidden" name="content" value="">
                                <button type="submit" class="btn btn-success "><i class="fas fa-plus"></i></button>
                            </form>
                        </div>
                        <div>
                        <a href="{{ route('logout') }}" class="btn bg-dark text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        </div>
                    </div>
                </div>

                <div>  

                    @foreach($memos as $memo)
                    <div class="card mt-3 bg-primary text-white">
                        <div class="card-body" style="padding:0.5rem;position:relative;">
                            <div class="w-25 text-right" style="position:absolute;right:20px;">
                                <div class="dropdown">
                                    <a class="text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h fa-1x"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('memo.show',$memo->id)}}">新規メモ作成</a>
                                        <a class="dropdown-item" href="{{route('memo.show',$memo->id)}}">メモの編集</a>
                                        <a class="dropdown-item" href="{{route('memo.destroy',$memo->id)}}">メモを削除する</a>
                                        <!-- <a class="dropdown-item" href="#"></a> -->
                                    </div>
                                </div>
        
                            </div>
                            <h6 class="card-title">{{$memo->title}}</h6>
                            <p class="card-text text-body text-truncate">{{$memo->content}}</p>
                            <div class="text-right">
                                <small class="text-muted">{{$memo->created_at}}</small>
                            </div>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

            <div class="col-md-9 border-left">

            <?php $startmemo = "";?>

            <?php $startmemo = $catchmemo;?>


            @if(!$startmemo == "")

            <form action="{{route('memo.create',$catchmemo->id)}}" method="POST">
                @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="w-100 border-bottom">

                        <div class="d-flex justify-content-end mr-3 mb-3">
                            <div class="mr-2">
                                <button type="submit" class="btn btn-success text-white"><i class="fas fa-location-arrow"></i></button>
                            </div>
                            <div>
                                <a href="{{route('memo.destroy',$catchmemo->id)}}" class="btn bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>

                        <div class="mt-3">
                            <div class="mb-3">
                                <label for=""><h4>タイトル</h4></label>
                                <input  type="text" class="form-control" name="title" value="{{ $catchmemo->title }}">
                            </div>
                            <div class="">
                                <label for=""><h5>メモ帳</h5></label>
                                <textarea name="content" class="form-control" cols="30" rows="30" placeholder=". . . . テキストを入力してください">{{$catchmemo->content}}</textarea>
                            </div>
                        </div>
                </form>

                @endif

            </div>
        

    </div>
</div>
@endsection
