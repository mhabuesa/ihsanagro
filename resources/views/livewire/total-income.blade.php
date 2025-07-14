    
    <div class="col-lg-4 mt-5">
        <div class="card">
            <div class="card-header text-center bg-dark p-3">
                <h3 class="text-white">আয়</h3>
                 @if ($totalIncomeSum === null)
                    <small class="text-white">( {{$lastIncome->created_at->format('d-M-Y')}} থেকে শুরু )</small>
                    @endif
                <div class="card bg-light my-2 p-2 rounded">
                    <form wire:submit.prevent="income">
                        <div class="col-sm-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-4 col-lg-6 text-center">
                                    <label for="start">শুরু</label>
                                    <input type="date" wire:model="start" class="form-control">
                                    @error('start') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-4 col-lg-6 text-center">
                                    <label for="end">শেষ</label>
                                    <input type="date" wire:model="end" class="form-control">
                                    @error('end') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-4 col-lg-6 text-center">
                                    <label class="form-label"></label>
                                    <button type="submit" title="Search" class="btn btn-dark btn-sm mt-3">
                                        <i class="fa fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body text-center" style="background-color: #74eeb1">
                @if ($totalIncomeSum !== null)
                    <h3 class="pt-4">{{ $totalIncomeSum }}/=</h3>
                @else
                    <h3 class="pt-4">{{ $incomeInYear }}/=</h3>
                @endif
            </div>
        </div>
    </div>