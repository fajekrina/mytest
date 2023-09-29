<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_Kendaraan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'm_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $guarded = ['id_kendaraan'];

    protected $fillable = [
        'merk',
        'jenis',
        'nama',
        'nopol',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    
    public function titip() {
        return $this->hasOne(Trans_Titip::class, 'id_kendaraan');
    }
}
