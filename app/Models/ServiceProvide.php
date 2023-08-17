<?php

namespace App\Models;

use App\Models\addServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvide extends Model
{
    use HasFactory;
    protected $table = 'services_provides';
    protected $primaryKey = 'nId';

    public function service()
    {
        return $this->belongsTo(User::class);
    }
}
