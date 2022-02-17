@extends('layouts.app')
@section('title', '本の一覧')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2" id="text">
    <h2>My Book List / <a class="btn btn btn-warning fw-bold" href="{{ route('create') }}">作成</a></h2>
    @if (session('err_msg'))
      <p class="text-success">
        {{ session('err_msg') }}
      </p>
    @endif
      <table class="table table-striped">
          <tr class="thead bg-dark">
            <th class="text-white">本の番号</th>
            <th class="text-white">本のタイトル</th>
            <th class="text-white">日付</th>
            <th class="text-white">学んだこと</th>
            <th></th>
            <th></th>
          </tr>

          @foreach($books as $book)
          <tr>
              <td>{{ $book->id }}</td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->created_at }}</td>
              
              <td><button type="button" class="btn btn-info" onclick="location.href='/show/{{ $book->id }}'">内容</button></td>
              
              <td><button type="button" class="btn btn-primary" onclick="location.href='/edit/{{ $book->id }}'">編集</button></td>
              
              <form method="POST" action="{{ route('delete', $book->id)}}" onSubmit="return checkDlete()">
                @csrf
                <td><button type="submit" class="btn btn-danger" onclick=>削除</button></td>
              </form>
            </tr>
            @endforeach

      </table>
  </div>
</div>
<script>
function checkDlete(){
if(confirm('削除してもいいかな？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
