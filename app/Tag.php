<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    public function articles(){
      return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function scopeSearch($query, $name)
    {
      if (trim($name) != "") {
        $query->where('name',"LIKE", "%$name%");
      }
    }

    public function scopeSearchTag($query, $name)
    {
      if (trim($name) != "") {
        $query->where('name',"=", "$name");
      }
    }

}
