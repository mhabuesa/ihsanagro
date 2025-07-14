@extends('layouts.backend')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>প্রজেক্ট তালিকা</h4>
                <a href="{{ route('project.add') }}">
                    <h4 class="btn btn-success">নতুন প্রজেক্ট &nbsp;<i class="fa-solid fa-plus"></i></h4>
                </a>
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
                        @foreach ($projects as $sl => $project)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $project->created_at->format('d-m-Y') }}</td>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->land_amount }}</td>
                                <td>{{ $project->duration }}</td>
                                <td>&#2547; {{ $project->contract_bill }}</td>
                                <td>
                                    &#2547; {{ $project->income->sum('amount') }}
                                </td>
                                <td>
                                    &#2547; {{ $project->expense->sum('amount') }}
                                </td>
                                <td>
                                    {{ $project->income->sum('amount') - $project->expense->sum('amount') }}
                                </td>
                                <td><a href="{{ route('project.details', $project->id) }}"
                                        class="btn btn-info">বিস্তারিত</a></td>
                                <td><a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary">আপডেট</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
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
                title: "{{ session('created') }}"
            });
        </script>
    @endif
@endpush
