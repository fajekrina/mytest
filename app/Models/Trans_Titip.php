<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trans_Titip extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'trans_titip';
    protected $primaryKey = 'id_titip';
    protected $guarded = ['id_titip'];

    protected $fillable = [
        'id_kendaraan',
        'tgl_titip',
        'tgl_berakhir',
        'harga_sewa',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    
    public function kendaraan() {
        return $this->belongsTo(M_Kendaraan::class, 'id_kendaraan');
    }

    public function titip_sewa() {
        return $this->hasMany(Trans_Sewa::class, 'id_titip');
    }
}
