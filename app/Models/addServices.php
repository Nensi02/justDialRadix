<?php

namespace App\Models;

use App\Models\serviceProvide;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addServices extends Model
{
    use HasFactory;
    protected $table = 'add_services';
    protected $primaryKey = 'nId';
    public function serviceProvide()
    {
        return $this->hasMany(serviceProvide::class);
    }
}
