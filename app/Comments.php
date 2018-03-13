<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model{

    //モデルと関連しているテーブル
    protected $table = 'comments';
    //モデルで使用するコネクション名
    protected $connection = 'mysql';

    protected $touches = array('post');

    public function post() {
        return $this->belongsTo('App\Post');
    }

}