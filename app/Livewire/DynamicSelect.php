<?php

namespace App\Livewire;

use App\Models\ProjectModel;
use Livewire\Component;

class DynamicSelect extends Component
{


    public function render()
    {
        $projects = ProjectModel::all();
        return view('livewire.dynamic-select', [
            'projects'=>$projects,
        ]);
    }
}
