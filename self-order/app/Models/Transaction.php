<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'No_trx';
    protected $guarded = ['No_trx'];
    public $timestamps = FALSE;

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id_menu')->withTrashed();
    }

    public function detail()
    {
        return $this->belongsTo(Detailtrx::class, 'kode_trx', 'kode_trx')->withTrashed();
    }
}