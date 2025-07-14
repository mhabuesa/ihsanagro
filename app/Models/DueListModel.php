<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueListModel extends Model
{
    use HasFactory;

    function project(){
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }
}
