@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">নোট বিবরণ</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('note.update',$note->id)}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="title" class="form-label">টাইটেল লিখুন</label>
                           <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{$note->title}}">
                        </div>
                        <div class="mt-3">
                            <label for="note" class="form-label">নোট লিখুন</label>
                            <textarea name="note" id="note" class="form-control" cols="30" rows="10" >{{$note->note}}</textarea>
                        </div>
                        <div class="mt-3 d-flex justify-content-between" >
                            <a href="{{route('note')}}" class="btn btn-success"> <i class="fa-solid fa-arrow-left"></i> &nbsp; নোট দেখুন</a>
                            <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


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

