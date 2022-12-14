<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    public $timestamps = false;
    protected $fillable = [
        'firstName', 'lastName', 'email', 'gender'
    ];
}
