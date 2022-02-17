<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * 本の一覧
     * 
     * areturn view
    */
    public function show() {
        $books = Book::all();

        return view('home', ['books' => $books]);
    }

    /**
     * 詳細一覧
     * @param int $id
     * @return view
     */
    public function detail($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        return view('book.detail', ['book' => $book]);
    }

    /**
     * 登録画面を表示する
     * @return view
     */

    public function create() {
        return view('book.form');
    }

    /**
     * 登録する
     * @return view
     */

    public function store(BookRequest $request) {
        //データを受け取る
        $inputs = $request->all();
        
        \DB::beginTransaction();

        try {
            //code...
            //本を登録
            Book::create($inputs);
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'あなたの本を登録しました。');
        return redirect(route('show'));
    }

    /**
     * 編集フォームを表示
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        return view('book.edit', ['book' => $book]);
    }

    /**
     * 更新
     * @return view
     */

    public function update(BookRequest $request) {
        //データを受け取る
        $inputs = $request->all();

        // dd($inputs);
        
        \DB::beginTransaction();

        try {
            //code...
            //更新！！
            $book = Book::find($inputs['id']);
            $book->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $book->save();
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'あなたの本を更新しました。');
        return redirect(route('show'));
    }

    /**
     * 削除機能
     * @param int $id
     * @return view
     */
    public function delete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        
        try {
            //code...
            //本を削除
            Book::destroy($id);
        } catch (\Throwable $th) {
            abort(500);
        }

        \Session::flash('err_msg', '削除ができました');
        return redirect(route('show'));

    }


}
