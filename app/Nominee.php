<?php

namespace inom;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = ['user_id', 'email', 'firstName', 'middleName', 'lastName'];

}
