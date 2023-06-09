<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "table_employees";
    protected $primaryKey = "employee_id";
}
