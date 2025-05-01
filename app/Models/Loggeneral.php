<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loggeneral extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'ip_address',
        'action' ,
        'table_name',
        'record_id',
        'column_name',
        'old_value',
        'new_value',
        'change_time'];
    protected $table = 'audit_log';
}
