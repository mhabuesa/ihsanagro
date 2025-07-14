@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Note Count</h4>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Note</th>
                                <th>Amount</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>

                        <tr id="row">
                            <td class="note">1000/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">500/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">100/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">50/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">20/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">10/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>
                        <tr id="row">
                            <td class="note">5/=</td>
                            <td style="width: 150px">
                                <input class="amount form-control" type="number">
                            </td>
                            <td>
                                <p class="subtotal">0</p>
                            </td>
                        </tr>


                        <tfoot>
                            <tr>
                                <th colspan="2">
                                    <p>Total &nbsp; =</p>
                                </th>
                                <th class="d-flex justify-content-center">
                                    <p id="total">0</p>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
       // Function to update the subtotal and total fields
function updateTotals() {
    let total = 0;

    // Select all rows in the table
    document.querySelectorAll('tr#row').forEach(row => {
        const note = parseFloat(row.querySelector('.note').innerText) || 0;
        const amountInput = row.querySelector('.amount');
        const amount = parseFloat(amountInput.value) || 0; // Get the input value or 0 if empty
        const subtotalField = row.querySelector('.subtotal');

        // Calculate the subtotal for the row
        const subtotal = note * amount;
        subtotalField.innerText = subtotal.toFixed(2); // Update the subtotal field with two decimal places

        // Add to total sum
        total += subtotal;
    });

    // Update the total field
    document.getElementById('total').innerText = total.toFixed(2);
}

// Attach event listeners to all amount inputs
document.querySelectorAll('.amount').forEach(input => {
    input.addEventListener('input', updateTotals);
});

// Initial calculation to set default values
updateTotals();

    </script>
@endsection
