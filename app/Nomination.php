<?php

namespace inom;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    protected $fillable = ['nominee_id', 'tree_id', 'depth', 'user_id',
    'walk', 'call', 'host', 'yardSign', 'sign', 'fbShare', 'twShare', 'donate', 'confirmed', 'issues'];

    public function nominee()
    {
        return $this->belongsTo(Nominee::class);
    }

    public function tree()
    {
        return $this->hasOne(Tree::class);
    }

}
