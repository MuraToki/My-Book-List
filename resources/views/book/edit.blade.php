@extends('layouts.app')
@section('title', '編集フォーム')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 m-auto">
        <h2>編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
          @csrf
          <input type="hidden" name="id" value="{{ $book->id }}">
            <div class="form-group">
                <label for="title">
                    本のタイトル
                </label>
                <input id="title" name="title" class="form-control" value="{{ $book->title }}" type="text" placeholder="何の本を読んだ？">
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
                <textarea id="content" name="content" class="form-control" rows="4" placeholder="編集する内容を書いてください">{{ $book->content }}</textarea>
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
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(confirm('更新してもいいかな？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection