@extends('layouts.backend')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card table-responsive">
                <div class="card-header d-flex justify-content-between">
                    <h4>আয় তালিকা</h4>
                    <a href="{{route('add.income')}}"><h4 class="btn btn-success waves-effect waves-light">নতুন আয়  &nbsp;<i class="fa-solid fa-plus"></i></h4></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>নং</th>
                            <th>তারিখ</th>
                            <th>প্রযেক্ট</th>
                            <th>এমাউন্ট</th>
                            <th>মন্তব্য</th>
                            <th>একশন</th>
                        </tr>

                        @foreach ($incomes as $sl=> $income )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$income->created_at->format('d:M:Y')}}</td>
                                @php
                                    if ($income->project_id == 0) {
                                        $project_name = '';
                                    }
                                    else{
                                        $project = App\Models\ProjectModel::where('id',$income->project_id)->get()->first();
                                        $project_name = $project->project_name;
                                    }
                                @endphp

                                <td class="{{$project_name == ''?'table-secondary':'table-success'}}">{{$project_name}}</td>
                                <td>{{$income->amount}}</td>
                                <td>{{$income->comment}}</td>
                                <td style="width: 200px">
                                    <a href="{{route('income.edit',$income->id)}}" class="btn btn-success mt-2">Edit</a>
                                    <button class="mt-2 btn btn-danger delete-button" data-id="{{ $income->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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
@if (session('added'))
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
    title: "{{session('added')}}"
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
                        fetch(`/income/delete/${itemId}`, {
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