    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <?php

    use App\Models\Item; ?>
    <!-- メンバー登録用パネル... -->
    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
        <!-- <h1>{{ $user_id }}</h1> -->
        <?php $members = Item::where('id', $user_id)->first(); ?>
        <!-- 新タスクフォーム -->
        <form action="{{ url('/' . $user_id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <h1>商品編集 商品ID:<?= $user_id ?></h1>
                <!-- <label for="member-name" class="col-sm-3 control-label">名前</label> -->

                <div class="col-sm-6">
                    <input type="text" name="name" id="member-name" class="form-control" placeholder="名前" value="{{$members->name}}">
                    <!-- old関数に置き換え -->
                </div>
                <!-- <label for="member-phone" class="col-sm-3 control-label">電話番号</label> -->

                <div class="col-sm-6">
                    <input type="text" name="type" id="member-type" class="form-control" placeholder="種別" value="{{$members->type}}">
                </div>
                <!-- <label for="member-email" class="col-sm-3 control-label">メールアドレス</label> -->

                <div class="col-sm-6">
                    <input type="text" name="detail" id="member-detail" class="form-control" placeholder="詳細" value="{{$members->detail}}">
                </div>

            </div>

            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default" name="submit">
                        <i class="fa fa-plus"></i> >> 編集
                    </button><br>
                    <button type="submit" class="btn btn-default" name="submit_del">
                        <i class="fa fa-plus"></i> >> 削除
                    </button><br>
                    <button type="submit" class="btn btn-default" name="submit_return">
                        <i class="fa fa-plus"></i> >> 戻る
                    </button>
                </div>
            </div>
        </form>
    </div>