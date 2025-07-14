@extends('layouts.backend')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card table-responsive">
                <div class="card-header d-flex justify-content-between">
                    <h4>সাধারণ খরচ তালিকা</h4>
                    <a href="{{route('add.income')}}"><h4 class="btn btn-success waves-effect waves-light">নতুন খরচ  &nbsp;<i class="fa-solid fa-plus"></i></h4></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>নং</th>
                            <th>তারিখ</th>
                            <th>খরচের খাত</th>
                            <th>এমাউন্ট</th>
                            <th>মন্তব্য</th>
                            <th>একশন</th>
                        </tr>

                        @foreach ($expenses as $sl=> $expense )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$expense->created_at->format('d:M:Y')}}</td>
                                <td>{{$expense->purpose}}</td>
                                <td>{{$expense->amount}}</td>
                                <td>{{$expense->comment}}</td>
                                <td style="width: 200px">
                                    <a href="{{route('expense.restore',$expense->id)}}" class="btn btn-success">ফিরে আনুন</a>
                                    <a href="{{route('expense.per.delete',$expense->id)}}" class="btn btn-danger">মুছে ফেলুন</a>
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
@if (session('per_delete'))
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
    title: "{{session('per_delete')}}"
    });
</script>
@endif
@if (session('restore'))
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
    title: "{{session('restore')}}"
    });
</script>
@endif
@endpush
