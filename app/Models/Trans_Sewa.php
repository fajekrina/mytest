<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trans_Sewa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'trans_sewa';
    protected $primaryKey = 'id_sewa';
    protected $guarded = ['id_sewa'];

    protected $fillable = [
        'id_titip',
        'tgl_awal',
        'tgl_akhir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    
    public function sewa_titip() {
        return $this->belongsTo(Trans_Titip::class, 'id_titip');
    }
}
