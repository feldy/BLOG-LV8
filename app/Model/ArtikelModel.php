<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'tbl_artikel';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
