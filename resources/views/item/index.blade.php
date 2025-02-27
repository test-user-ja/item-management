@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">商品一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <form action="{{ url('items') }}" method="GET">
                                <input type="text" name="keyword" value="{{ $keyword }}">
                                <input type="submit" value="検索" class="btn btn-default">
                            </form>
                        </div>
                        @if($role)
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>@sortablelink('id','ID')</th>
                            <th>@sortablelink('name','名前')</th>
                            <th>@sortablelink('type','種別')</th>
                            <th>@sortablelink('detail','詳細')</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->detail }}</td>
                            @if($role)
                            <td><a href="items/edit/{{ $item->id }}">>> 編集</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop