<?php

namespace inom;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    protected $fillable = ['nominee_id', 'tree_id', 'depth', 'user_id'];

    public function nominee()
    {
        return $this->hasOne(Nominee::class);
    }

    public function tree()
    {
        return $this->hasOne(Tree::class);
    }

}
