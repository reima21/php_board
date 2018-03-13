<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    //モデルと関連しているテーブル
    protected $table = 'posts';
    //モデルで使用するコネクション名
    protected $connection = 'mysql';

    public function comments(){
        return $this->hasMany('App\Comments', 'post_id');
    }

}