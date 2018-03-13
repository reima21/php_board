<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Posts;
use Illuminate\Http\Request;
use App\Post;
//追加
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Log;

class CommentsController extends Controller
{

    public function index()
    {

        \DB::enableQueryLog();

        $time = array();

        $post_id = Input::get('post_id');

        $post = Post::find($post_id);

        Log::debug($post_id);

        Log::debug($post->title);
        Log::debug($post->content);

        $query = \DB::getQueryLog();

        Log::debug($query);


        $comment = Comments::all();
        return view('bbc.comment')->with('post', $post);



        $comment = Comments::find(1);
        $comments = $comment->post_id;


    }


    public function store()
    {
        $rules = [
            'name' => 'required',
            'content'=>'required',
        ];

        $messages = array(
            'name.required' => '名前を正しく入力してください。',
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
            $comment = new Comments;
            $comment->name = Input::get('name');
            $comment->content = Input::get('content');
            $comment->post_id = Input::get('post_id');
            $comment->id = Input::get('id');
            //
//            $post = Post::all();
//            $post->updated_at = $comment->updated_at;
//            $post->save();
            $comment->save();

            return redirect("http://0.0.0.0:8000/bbc");
        }else{
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }


}