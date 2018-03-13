<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{

    public function show($id)
    {
        $post = Post::find($id);
        //$post = Post::all();
        return View::make('bbc.comment')->with('post', $post);
    }

    public function post() {
        return view('bbc.post');
    }

    public function index()
    {
        \DB::enableQueryLog();


        $post = Post::find(1);
        $comments = $post->comments();
        $query = \DB::getQueryLog();

        Log::debug($query);

        foreach ($comments as $comment) {
            //
            Log::debug("aaaannn");
            Log::debug($comment->content);
        }


        $posts = Post::all();
        //降順にソート
        //$posts = ksort($posts->updated_at);
        //$posts->sortBy('updated_at');
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('bbc.index')->with('posts', $posts);
    }


    public function store()
    {
        $rules = [
            'name' => 'required',
            'title' => 'required',
            'content'=>'required',
        ];

        $messages = array(
            'name.required' => '名前を正しく入力してください。',
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '内容を正しく入力してください。',
        );

        /*
         * インスタンス生成
         * */
        $validator = Validator::make(Input::all(), $rules, $messages);


        /*
         * Validatorインスタンスが生成されたら、
         * fails（もしくはpasses）メソッドを使用しバリデーションを実行
         * */
        if ($validator->passes()) {
            $post = new Post;
            $post->name = Input::get('name');
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->id = Input::get('id');
            $post->save();
            return redirect("http://0.0.0.0:8000/bbc");
        }else{
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }



}