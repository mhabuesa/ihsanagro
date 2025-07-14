@extends('layouts.backend')
@section('content')


<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>প্রজেক্ট তালিকা</h4>
            <a href="{{route('project.add')}}"><h4 class="btn btn-success">নতুন প্রজেক্ট  &nbsp;<i class="fa-solid fa-plus"></i></h4></a>
        </div>
        
        <div class="card-body table-responsive">

            <table id="example" class="display table-bordered" style="width:100%">
                <thead>
                    <tr style="text-center">
                        <th>নং</th>
                        <th>তারিখ</th>
                        <th>নাম</th>
                        <th>জমি</th>
                        <th>মেয়াদ</th>
                        <th>চুক্তি বিল</th>
                        <th>মোট আয়</th>
                        <th>মোট ব্যয়</th>
                        <th>লাভ/ক্ষতি</th>
                        <th>বিস্তারিত</th>
                        <th>আপডেট</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($projects as $sl=> $project )

                    <tr>
                        <td>{{$sl+1}}</td>
                        <td>{{$project->created_at->format('d-m-Y')}}</td>
                        <td>{{$project->project_name}}</td>
                        <td>{{$project->land_amount}}</td>
                        <td>{{$project->duration}}</td>
                        <td>&#2547; {{$project->contract_bill}}</td>
                        <td>
                            &#2547; {{App\Models\IncomeModel::where('project_id', $project->id)->sum('amount')}}
                        </td>
                        <td>
                            &#2547; {{App\Models\ExpenseModel::where('project_id', $project->id)->sum('amount')}}
                        </td>
                        <td>
                            @php
                                $income = App\Models\IncomeModel::where('project_id', $project->id)->sum('amount');
                                $expense = App\Models\ExpenseModel::where('project_id', $project->id)->sum('amount');
                                $profit = $income - $expense;
                            @endphp
                            {{$profit}}
                        </td>
                        <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#referAndEarn{{$project->id}}">বিস্তারিত</a></td>
                        <td><a href="{{route('project.edit',$project->id)}}" class="btn btn-primary">আপডেট</a></td>
                    </tr>

                    @endforeach


                </tbody>
            </table>

            @foreach ($projects as $sl=> $project )

            <!-- Refer & Earn Modal -->
            <div class="modal fade" id="referAndEarn{{$project->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-refer-and-earn">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">প্রজেক্ট বিবরণ</h3>

                    </div>
                    <div class="row ">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>প্রজেক্টের নাম:</strong></th>
                                            <td>{{$project->project_name}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>প্রজেক্টের ঠিকানা:</strong></th>
                                            <td>{{$project->address}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>শুরুর তারিখ:</strong></th>
                                            <td>{{$project->start_date}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>জমির পরিমান:</strong></th>
                                            <td>{{$project->land_amount}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>জমির মালিক:</strong></th>
                                            <td>{{$project->land_owner}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>মোট চুক্তি বিল:</strong></th>
                                            <td>{{$project->contract_bill}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>মেয়াদ:</strong></th>
                                            <td>{{$project->duration}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th><strong>মন্তব্য:</strong></th>
                                            <td>{{$project->comments}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!--/ Refer & Earn Modal -->

            @endforeach
        </div>
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






