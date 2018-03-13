<?php
use Illuminate\Database\Seeder;
use App\Post;
use App\Comments;
use Illuminate\Database\Query\Builder;

class PostCommentSeeder extends Seeder{

    public function run(){
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        $comment_dammy = 'コメントダミーです。ダミーコメントだよ。';

        for( $i = 1 ; $i <= 10 ; $i++) {
            $post = new Post;
            $post->title = "$i 番目の投稿";
            $post->content = $content;
            $post->name = 'reiji';
            $post->save();

            for ($j=0; $j <= 2; $j++) {
                $comment = new Comments;
                $comment->name = '名無しさん';
                $comment->content = $comment_dammy;
                $comment->post_id = $j;
                // モデル(Post.php)のCommentsメソッドを読み込み、post_idにデータを保存する
                $post->comments()->save($comment);
            }
        }

    }
}