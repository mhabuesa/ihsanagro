<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function income(){
        return $this->hasMany(IncomeModel::class, 'project_id', 'id');
    }

    function expense(){
        return $this->hasMany(ExpenseModel::class, 'project_id', 'id');
    }
}
