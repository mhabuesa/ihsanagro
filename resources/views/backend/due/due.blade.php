@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-responsive">
                <div class="card-header">
                    <h3 class="text-center">বাঁকির তালিকা</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>নং</th>
                            <th>প্রজেক্ট</th>
                            <th>খাত</th>
                            <th>পরিমান</th>
                        </tr>
                        @foreach ($dueData as $sl=> $due )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$due->project->project_name}}</td>
                                <td>{{$due->purpose}}</td>
                                <td>{{$due->amount}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
