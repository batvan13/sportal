<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
      // Mass assigned
      protected $fillable=[
            'user_id',
            'title',
            'slug',
            'description_short',
            'description',
            'meta_title',
            'meta_description',
            'meta_keyword',
            'published',
            'viewed',
            'created_by',
            'modified_by',
    ];

      public function user()
      {
          return $this->belongsTo('App\User');
      }
}
