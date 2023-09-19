<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class ShiftManagements extends Model
{
    public $table = "shift_managements";

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function shiftClousure()
    {
        return $this->hasMany(ShiftClosure::class, 'turn', 'id');
    }

    public function scopeLast($query, $user)
    {
        return $query->where('user_id', $user)
            ->get()
            ->last();
    }
}
