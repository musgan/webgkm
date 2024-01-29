<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = ['title', 'short_text','gambar_unggulan','slug'];

    public function postContents(){
        return $this->hasMany(PostContentModel::class,"post_id","id")->orderBy('urutan','asc')->get();
    }
}
