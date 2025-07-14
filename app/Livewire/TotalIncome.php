<?php

namespace App\Livewire;

use App\Models\IncomeModel;
use Carbon\Carbon;
use Livewire\Component;

class TotalIncome extends Component
{
    public $start = '';
    public $end = '';
    public $totalIncomeSum = null;

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
        $this->totalIncomeSum = IncomeModel::whereBetween('created_at', [$this->start, $this->end])
                                           ->sum('amount');

        session()->flash('status', 'Data retrieved successfully.');
    }

    // Render function to display the view
    public function render()
    {
        $incomeInYear = IncomeModel::all()->sum('amount');
        $lastIncome = IncomeModel::orderBy('created_at', 'asc')->first();

        return view('livewire.total-income', [
            'incomeInYear' => $incomeInYear,
            'totalIncomeSum' => $this->totalIncomeSum,
            'lastIncome' => $lastIncome,
        ]);
    }
}
