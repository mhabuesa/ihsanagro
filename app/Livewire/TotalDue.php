<?php

namespace App\Livewire;

use App\Models\DueListModel;
use Carbon\Carbon;
use Livewire\Component;

class TotalDue extends Component
{
    public $start = '';
    public $end = '';
    public $totalDueSum = null;

    // Rules for validation
    protected $rules = [
        'start' => 'required|date|before_or_equal:end',
        'end' => 'required|date|after_or_equal:start',
    ];

    // Function to handle the form submission
    public function income()
    {
        $this->validate(); // Validate the inputs

        // Calculate the sum of the amounts within the date range
        $this->totalDueSum = DueListModel::whereBetween('created_at', [$this->start, $this->end])
                                           ->sum('amount');

        session()->flash('status', 'Data retrieved successfully.');
    }

    // Render function to display the view
    public function render()
    {
        $dueInYear = DueListModel::whereYear('created_at', Carbon::now()->year)->sum('amount');

        return view('livewire.total-due', [
            'dueInYear' => $dueInYear,
            'totalDueSum' => $this->totalDueSum,
        ]);
    }


}
