@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4><strong>{{ $project->project_name }}</strong> - প্রজেক্টের বিস্তারিত তথ্য</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"> তথ্য ফিল্টার</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('project.details', $project->id) }}" method="GET">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="start_date" class="form-label">শুরুর তারিখ</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date"
                                                value="{{ request('start_date') }}">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="end_date" class="form-label">শেষ তারিখ</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date"
                                                value="{{ request('end_date') }}">
                                        </div>
                                        <div class="mt-3 col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary m-2">ফিল্টার করুন</button>
                                            <a href="{{ route('project.details', $project->id) }}"
                                                class="btn btn-info m-2">রিসেট করুন &nbsp; <i
                                                    class="fa-solid fa-rotate"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 m-auto mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"> সংক্ষিপ্ত বিবরণ</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>আয়</th>
                                    <td>{{ $total_income }}</td>
                                </tr>
                                <tr>
                                    <th>ব্যায়</th>
                                    <td>{{ $total_expense }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>আয় হিসাব</h4>
                        </div>
                        <div class="card-body">
                            <table id="example" class="display table-bordered" style="width:100%">
                                <thead>
                                    <tr style="text-center">
                                        <th>নং</th>
                                        <th>তারিখ</th>
                                        <th>এমাউন্ট</th>
                                        <th>মন্তব্য</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($incomes as $sl => $income)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $income->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $income->amount }}</td>
                                            <td>{{ $income->comment }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>ব্যয় হিসাব</h4>
                        </div>
                        <div class="card-body">
                            <table id="expense" class="display table-bordered" style="width:100%">
                                <thead>
                                    <tr style="text-center">
                                        <th>নং</th>
                                        <th>তারিখ</th>
                                        <th>এমাউন্ট</th>
                                        <th>মন্তব্য</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($expenses as $sl => $expense)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->comment }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        new DataTable('#expense', {
            layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false
                    }
                }
            }
        });
    </script>
@endpush
