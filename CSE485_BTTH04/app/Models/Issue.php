<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = ['computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status'];

    // QUAN TRỌNG: Phải có hàm này để kết nối với bảng computers
    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id', 'id');
    }
}