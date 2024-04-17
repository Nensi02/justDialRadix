<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvide extends Model
{
    use HasFactory;
    protected $table = 'service_provides';
    protected $primaryKey = 'nId';

    public function service()
    {
        return $this->belongsTo('App\Models\addServices', 'nServiceId');
    }
}
