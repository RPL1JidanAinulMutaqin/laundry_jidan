<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    public $incrementing = true;
    protected $table = 'member';
    protected $guarded = ['id'];

    public function penjemputan()
    {
        return $this->hasMany(Penjemputan::class, 'id_penjemputan');
    }
}
