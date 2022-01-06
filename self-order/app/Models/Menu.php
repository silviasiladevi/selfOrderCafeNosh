<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    use HasFactory;
    const CREATED_AT = Null;
    protected $fillable = ['nama_menu', 'type', 'desc', 'price', 'pic'];
    protected $primaryKey = 'id_menu';

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function trx()
    {
        return $this->hasMany(Transaction::class, 'id_menu', 'menu_id')->withTrashed();
    }
}