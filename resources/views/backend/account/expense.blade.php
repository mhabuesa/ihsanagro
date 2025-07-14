@extends('layouts.backend')
@section('content')

    <div class="row">

        <div class="card">
            <div class="card-header">
                <div class="col-lg-6 m-auto">
                    <div class="card bg-light my-2 p-2  rounded">
                        <form action="{{route('expense.filter')}}" method="GET">
                            @csrf
                            <div class="col-sm-12 ">
                                <div class="row d-flex justify-content-center">

                                    <div class="col-sm-4 text-center">
                                        <label class="text-center" for="input_season_id">শুরু</label>
                                        <input type="date" name="start" class="form-control">
                                        @error('start')
                                            <small class="text-danger">শুরুর তারিখ লিখুন</small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        <label class="text-center" for="input_season_id">শেষ</label>
                                        <input type="date" name="end" class="form-control">
                                        @error('end')
                                            <small class="text-danger">শেষর তারিখ লিখুন</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <label class="form-label text-center"></label>
                                        <button type="submit" title="Search" class="btn btn-dark btn-lg mt-3 "><i class="fa fa-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-header d-flex justify-content-between">
                            <h4>সাধারণ খরচ তালিকা</h4>
                            <a href="{{route('add.expense')}}"><h4 class="btn btn-success waves-effect waves-light">নতুন খরচ  &nbsp;<i class="fa-solid fa-plus"></i></h4></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>নং</th>
                                    <th>তারিখ</th>
                                    <th>প্রফাইল</th>
                                    <th>খরচের খাত</th>
                                    <th>এমাউন্ট</th>
                                    <th>মন্তব্য</th>
                                    <th>একশন</th>
                                </tr>

                                @foreach ($normal_expense as $sl=> $expense )
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$expense->created_at->format('d:M:Y')}}</td>
                                        <td>{{$expense->profile_id}}</td>
                                        <td>{{$expense->purpose}}</td>
                                        <td>{{$expense->amount}}</td>
                                        <td>{{$expense->comment}}</td>
                                        <td style="width: 200px">
                                            <button class="mt-2 btn btn-danger delete-button" data-id="{{ $expense->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">
                    <div class="card table-responsive">
                        <div class="card-header">
                            <h4>প্রজেক্টের খরচ তালিকা</h4>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>নং</th>
                                    <th>তারিখ</th>
                                    <th>প্রফাইল</th>
                                    <th>খরচের খাত</th>
                                    <th>প্রযেক্ট</th>
                                    <th>এমাউন্ট</th>
                                    <th>মন্তব্য</th>
                                    <th>একশন</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($project_expense as $sl=> $expense )
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$expense->created_at->format('d:M:Y')}}</td>
                                        <td>{{ optional(App\Models\Profile::find($expense->profile_id))->name }}</td>
                                        <td>{{$expense->purpose}}</td>
                                        <td>{{App\Models\ProjectModel::where('id',$expense->project_id)->get()->first()->project_name}}</td>
                                        <td>{{$expense->amount}}</td>
                                        <td>{{$expense->comment}}</td>
                                        <td style="width: 200px">
                                            <button class="mt-2 btn btn-danger delete-button" data-id="{{ $expense->id }}">Delete</button>
                                        </td>
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
@if (session('delete'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "{{session('delete')}}"
    });
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                Swal.fire({
                    title: "আপনি কি মুছে ফেলতে চান?",
                    text: "আপনি এটিকে ফিরিয়ে আনতে পারবেন না!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/expense/delete/${itemId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "ডিলেট!",
                                    text: "মুছে ফেলা হয়েছে।",
                                    icon: "success"
                                }).then(() => {
                                    // Optionally, refresh the page or remove the deleted item from the DOM
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "There was a problem deleting the item.",
                                    icon: "error"
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the item.",
                                icon: "error"
                            });
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
