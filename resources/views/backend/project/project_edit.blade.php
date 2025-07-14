@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>প্রজেক্ট আপডেট</h3>
        </div>
        <div class="card-body">
            <form action="{{route('project.update', $project->id)}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-sm-6 ">
                        <label class="control-label" for="input-name">প্রজেক্টের নাম</label>
                        <input type="text" name="project_name" value="{{$project->project_name}}" id="input-name" class="form-control" required>
                        @error('project_name')
                            <small class="text-danger">প্রজেক্টের নাম লিখুন</small>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <label class="control-label" for="input-address">ঠিকানা</label>
                        <input type="text" name="address" value="{{$project->address}}" id="input-address" class="form-control" required>
                        @error('address')
                            <small class="text-danger">প্রজেক্টের ঠিকানা লিখুন</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label class="control-label" for="start_date">প্রজেক্ট শুরুর তারিখ</label>
                        <input type="date" name="start_date" value="{{$project->start_date}}" id="start_date" class="form-control" >
                        @error('start_date')
                            <small class="text-danger">প্রজেক্ট শুরুর তারিখ লিখুন</small>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="input-land_amount">জমির পরিমাণ (বিঘা)</label>
                        <input type="number" name="land_amount" value="{{$project->land_amount}}" id="input-land_amount" class="form-control">
                        @error('land_amount')
                            <small class="text-danger">জমির পরিমাণ লিখুন</small>
                        @enderror
                    </div>


                    <div class="col-sm-4">
                        <label class="control-label" for="input-land_owner">জমির মালিক</label>
                        <input type="text" name="land_owner" value="{{$project->land_owner}}" id="input-land_owner" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="input-owner_bill">মালিকের বিল</label>
                        <input type="text" name="owner_bill" value="{{$project->owner_bill}}" id="input-owner_bill" class="form-control">
                    </div>

                    <div class="col-sm-2 ">
                        <label class="control-label" for="input-installment">মালিকের কিস্তি</label>
                        <input type="number" name="installment" value="{{$project->installment}}" id="input-installment" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 ">
                        <label class="control-label" for="input-lease_holder">জমির লিজদাতা</label>
                        <input type="text" name="lease_holder" value="{{$project->lease_holder}}" id="input-lease_holder" class="form-control">
                    </div>

                    <div class="col-sm-2 ">
                        <label class="control-label" for="input-lease_bill">লিজদাতার বিল</label>
                        <input type="text" name="lease_bill" value="{{$project->lease_bill}}" id="input-lease_bill" class="form-control">
                    </div>

                    <div class="col-sm-2 ">
                        <label class="control-label" for="input-lease_installment">লিজদাতার কিস্তি</label>
                        <input type="number" name="lease_installment" value="{{$project->lease_installment}}" id="input-lease_installment" class="form-control">
                    </div>

                    <div class="col-sm-2 ">

                        <label class="control-label" for="input-land_owner">মোট চুক্তি বিল</label>
                        <input type="number" name="contract_bill" value="{{$project->contract_bill}}" id="input-contract_bill" class="form-control">
                        @error('contract_bill')
                            <small class="text-danger">প্রজেক্টের মোট চুক্তি বিল লিখুন</small>
                        @enderror

                    </div>



                    <div class="col-sm-2 ">

                        <label class="control-label" for="input-land_owner">মেয়াদ</label>
                        <input type="number" name="duration" value="{{$project->duration}}" id="input-contract_year" class="form-control">
                        @error('duration')
                            <small class="text-danger">প্রজেক্টের মেয়াদ লিখুন</small>
                        @enderror
                    </div>
                </div>

                <div class="row">

                <div class="col-sm-12 ">
                    <label>সার্বিক মন্তব্য</label>
                    <input type="text" id="comments" name="comments" value="{{$project->comments}}" class="form-control">
                </div>

                </div>

                <div class="col-sm-12 d-flex justify-content-between " style="margin-top: 10px;">

                    <a href="{{route('project')}}" class="btn btn-danger btn-lg">তালিকা</a>
                    <button type="submit" class="btn btn-success btn-lg pull-right">সাবমিট</button>

                </div>



            </form>
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
