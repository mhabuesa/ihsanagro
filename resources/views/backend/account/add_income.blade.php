@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="">নতুন ইনকাম যুক্ত করুন </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('income.store')}}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="project">প্রযেক্ট</label>
                            <select name="project" class="form-control" id="project">
                                <option value="">প্রযেক্ট সিলেক্ট করুন</option>
                                @foreach ($projects as $project )
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2">
                            <label for="amount">টাকার পরিমান</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="১২০০০">
                            @error('amount')
                                <span class="text-danger">টাকার পরিমান লিখুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="comment">মন্তব্য</label>
                            <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="মন্তব্য লিখুন"></textarea>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{route('income')}}" type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> &nbsp; তালিকা দেখুন</a>
                            <button type="submit" class="btn btn-primary">যুক্ত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
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
@endpush
