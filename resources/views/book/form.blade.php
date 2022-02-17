@extends('layouts.app')
@section('title', '作成画面')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 m-auto">
        <h2>作成フォーム / <a class="btn btn btn-info fw-bold" href="{{ route('show') }}">リスト</a></h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
          @csrf
            <div class="form-group">
                <label for="title">
                    本のタイトル
                </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text" placeholder="何の本を読んだ？">
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    学んだこと
                </label>
                <textarea id="content" name="content" class="form-control" rows="4" placeholder="何を学んだ？">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <a class="btn btn-secondary" href="{{ route('show') }}">
                    戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    投稿
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(confirm('投稿してもええか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection