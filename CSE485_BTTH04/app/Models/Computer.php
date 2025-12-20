<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    // Khai báo tên bảng (nếu bạn đặt tên bảng khác số nhiều của model)
    protected $table = 'computers';

    // Các trường có thể gán dữ liệu hàng loạt (Mass Assignment) [cite: 4, 5, 6, 7]
    protected $fillable = [
        'computer_name', 
        'model', 
        'operating_system', 
        'processor', 
        'memory', 
        'available'
    ];

    /**
     * Thiết lập mối quan hệ: Một máy tính có thể có nhiều sự cố báo cáo.
     * Đây là quan hệ Một - Nhiều (One-to-Many).
     */
    public function issues()
    {
        // Tham chiếu đến model Issue thông qua khóa ngoại computer_id [cite: 10]
        return $this->hasMany(Issue::class, 'computer_id', 'id');
    }
}