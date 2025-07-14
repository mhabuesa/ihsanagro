@extends('layouts.backend')
@section('content')

    <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="card table-responsive">
                <div class="card-header d-flex justify-content-between">
                    <h4>প্রফাইল তালিকা</h4>
                    <div class="bd-example">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#category_delete18">
                            <i class="fa fa-plus"></i> &nbsp; নতুন প্রফাইল
                        </button>
                    </div>
                    <div class="modal fade" id="category_delete18" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">প্রফাইল যুক্ত করুন</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('expense_profile_store')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">প্রফাইল নাম লিখুন</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="নাম লিখুন" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">বিরত থাকুন</button>
                                    <button type="submit" class="btn btn-primary">যুক্ত করুন</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>নং</th>
                            <th>তারিখ</th>
                            <th>নাম</th>
                            <th>মোট টাকা</th>
                            <th>একশন</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($profiles as $sl=> $profile )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$profile->created_at->format('d:M:Y')}}</td>
                                <td>{{$profile->name}}</td>
                                <td>{{ App\Models\ExpenseModel::where('profile_id', $profile->id)->sum('amount') }}</td>
                                <td style="width: 200px">
                                    <a href="{{route('expense_profile_show', $profile->id)}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#profile_{{$profile->id}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- Modal --}}
                            <div class="modal fade" id="profile_{{$profile->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">প্রফাইল অপডেট করুন</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('expense_profile_update', $profile->id)}}" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">প্রফাইল নাম লিখুন</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="নাম লিখুন" required value="{{$profile->name}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">বিরত থাকুন</button>
                                            <button type="submit" class="btn btn-primary">অপডেট করুন</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@if (session('success'))
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
    title: "{{session('success')}}"
    });
</script>
@endif

@endpush
