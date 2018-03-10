<?php

namespace Modules\Weasy\Models;

use Illuminate\Database\Eloquent\Model;

class Posters extends Model
{

    public function __construct()
    {
        //
    }

    protected $table = "weasy_posters";

    protected $hidden = ['created_at', 'deleted_at' , 'updated_at'];

}
