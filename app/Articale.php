<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
class Articale extends Model
{
    use SoftDeletes ,CascadeSoftDeletes;
    protected $cascadeDeletes = ['articaletranslation'];
    public function articaletranslation(){
        return $this->hasMany(ArticaleTranslation::class);
    }
}
