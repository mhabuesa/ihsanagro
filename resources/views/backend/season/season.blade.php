@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header d-flex justify-content-between">
                <h4>মৌসুম তালিকা</h4>
                <a href="{{route('season.create')}}"><h4 class="btn btn-primary">নতুন মৌসুম  &nbsp;<i class="fa-solid fa-plus"></i></h4></a>
            </div>
            <hr>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
                <th>নং</th>
                <th>নাম</th>
                <th>শুরুর তারিখ</th>
                <th>মন্তব্য</th>
                <th>আপডেট</th>
            </tr>
            @foreach ($seasons as $sl=> $season )

            <tr>
                <td>{{$sl+1}}</td>
                <td>{{$season->name}}</td>
                <td>{{$season->start_date}}</td>
                <td>{{$season->comment}}</td>
                <td style="width: 20px"><a href="{{route('season.edit', $season->id)}}" class="btn btn-primary">Update</a></td>
            </tr>

            @endforeach

          </table>
        </div>
    </div>
@endsection

@push('script')
@if (session('created'))
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
    title: "{{session('created')}}"
    });
</script>
@endif
@endpush


@push('script')
@if (session('update'))
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
    title: "{{session('update')}}"
    });
</script>
@endif
@endpush
