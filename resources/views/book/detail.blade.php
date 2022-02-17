@extends('layouts.app')
@section('title', '本の詳細')
@section('content')
<section >
  <header class="mb-4">
    <h1 class="text-center bg-dark text-white fw-bold p-1" style="height: 50px;">本の詳細</h1>
  </header>
  
  <main>
    <div>
      <h2 class="text-center">『{{ $book->title}}』</h2>
      <p class="text-center fs-3">{{ $book->content }}</p>
    </div>
    
    <div class="text-center">
      <h4>作成日</h4>
      <p>{{ $book->created_at }}</p>
      <h4>更新日</h4>
      <p>{{ $book->updated_at }}</p>
    </div>
    
    <div class="m-auto" style="width: 57px;">
      <a class="btn btn-primary" href="{{ route('show') }}">戻る</a>
    </div>
  </main>
</section>

@endsection
