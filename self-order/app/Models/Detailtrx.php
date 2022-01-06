<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Detailtrx extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $primaryKey = 'kode_trx';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function trx()
    {
        return $this->hasMany(Transaction::class);
    }
}