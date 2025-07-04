<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'IdAdmin';
    public $timestamps = false;

    protected $fillable = ['Nama', 'Username', 'Password'];
}
