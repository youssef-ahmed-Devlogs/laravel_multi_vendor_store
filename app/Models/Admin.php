<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public function isPublisher()
    {
        return $this->where('type', 'publisher')->count();
    }

    public function isAdmin()
    {
        return $this->where('type', 'admin')->count();
    }

    public function isSuperAdmin()
    {
        return $this->where('type', 'super-admin')->count();
    }
}
