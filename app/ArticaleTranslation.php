<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ArticaleTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'articale_id','lang','content'];
    public function artical(){
        return $this->belongsTo(Articale::class);
    }
}
