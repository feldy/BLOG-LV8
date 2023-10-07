<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'tbl_comment';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
