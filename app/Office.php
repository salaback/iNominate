<?php

namespace inom;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['partisan', 'office','district', 'filingDeadline', 'nextElection', 'notes'];
    protected $casts = [
        'partisan' => 'boolean',
        'district' => 'array'
    ];

    public function trees()
    {
        return $this->hasMany(Tree::class);
    }
}
