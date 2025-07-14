@extends('layouts.backend')
@section('content')
    <div class="row d-flex justify-content-center">

        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="">সাধারণ খরচ যুক্ত করুন </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('expense.store')}}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="purpose">খরচের খাত</label>
                            <input type="text" name="purpose" id="purpose" class="form-control" placeholder="খরচের খাত">
                            @error('purpose')
                                <span class="text-danger">খরচের খাত লিখুন</span>
                            @enderror
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
                            <a href="{{route('expense')}}" type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> &nbsp; তালিকা দেখুন</a>
                            <button type="submit" class="btn btn-primary">যুক্ত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="">প্রযেক্টের খরচ যুক্ত করুন </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('expense.store.project')}}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="project">প্রযেক্ট</label>
                            <select name="project_id" class="form-control" id="project">
                                <option value="">প্রযেক্ট সিলেক্ট করুন</option>
                                @foreach ($projects as $project )
                                <option {{old('project_id') == $project->id?'selected':''}} value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span class="text-danger">খরচের খাত সিলেক্ট করুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="expense_type">প্রদানের ধরন</label>
                            <select name="expense_type" class="form-control" id="expense_type">
                                <option value="">ধরন সিলেক্ট করুন</option>
                                <option {{old('expense_type') == '1'?'selected':''}} value="1">নগদ</option>
                                <option {{old('expense_type') == '0'?'selected':''}} value="0">বাঁকি</option>
                            </select>
                            @error('expense_type')
                                <span class="text-danger">প্রদানের ধরন সিলেক্ট করুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="profile">প্রফাইল</label>
                            <select name="profile_id" class="form-control" id="profile">
                                <option value="">প্রফাইল সিলেক্ট করুন</option>
                                @foreach ($profiles as $profile )
                                <option {{old('profile_id') == $profile->id?'selected':''}} value="{{$profile->id}}">{{$profile->name}}</option>
                                @endforeach
                            </select>
                            @error('profile_id')
                                <span class="text-danger">প্রফাইল সিলেক্ট করুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="expense_purpose">খরচের খাত</label>
                            <input type="text" name="expense_purpose" id="expense_purpose" class="form-control" placeholder="খরচের খাত" value="{{old('expense_purpose')}}">
                            @error('expense_purpose')
                                <span class="text-danger">খরচের খাত লিখুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="expense_amount">টাকার পরিমান</label>
                            <input type="number" name="expense_amount" id="expense_amount" class="form-control" placeholder="১২০০০" value="{{old('expense_amount')}}">
                            @error('expense_amount')
                                <span class="text-danger">টাকার পরিমান লিখুন</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="expense_comment">মন্তব্য</label>
                            <textarea name="expense_comment" id="expense_comment" cols="30" rows="5" class="form-control" placeholder="মন্তব্য লিখুন">{{old('expense_comment')}}</textarea>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
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
