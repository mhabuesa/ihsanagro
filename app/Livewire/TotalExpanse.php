<?php

namespace App\Livewire;

use App\Models\ExpenseModel;
use Carbon\Carbon;
use Livewire\Component;

class TotalExpanse extends Component
{
    public $start = '';
    public $end = '';
    public $totalExpenseSum = null;

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
        $this->totalExpenseSum = ExpenseModel::whereBetween('created_at', [$this->start, $this->end])
                                           ->sum('amount');

        session()->flash('status', 'Data retrieved successfully.');
    }

    // Render function to display the view
    public function render()
    {
        $expenseInYear = ExpenseModel::all()->sum('amount');
        $lastExpense = ExpenseModel::orderBy('created_at', 'asc')->first();

        return view('livewire.total-expanse', [
            'expenseInYear' => $expenseInYear,
            'totalExpenseSum' => $this->totalExpenseSum,
            'lastExpense' => $lastExpense,
        ]);
    }

}
