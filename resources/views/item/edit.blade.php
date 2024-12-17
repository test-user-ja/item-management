@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品編集</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <?php

        // use App\Models\Item; ?>
        <!-- メンバー登録用パネル... -->
        <!-- <php $members = Item::where('id', $user_id)->first();  ?>-->

            <div class="card card-primary">
                <form action="{{ url('items/' . $members->user_id) }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name',$members->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="種別" value="{{ old('type',$members->type) }}">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" value="{{ old('detail',$members->detail) }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">
                            編集
                        </button>
                        <button type="submit" class="btn btn-primary" name="submit_del">
                            削除
                        </button>
                        <button type="submit" class="btn btn-primary" name="submit_return">
                            戻る
                        </button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop