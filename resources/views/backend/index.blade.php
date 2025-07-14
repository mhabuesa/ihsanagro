@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 m-auto">
                        <div class="card">
                            <div class="card-header p-3 text-center bg-warning">
                                <h3 class="text-white">বর্তমান তহবীল
                                </h3>
                            </div>
                            <div class="card-body text-center pb-0" style="background-color: #009a83">
                                <h2 class="text-white pt-2 pb-2">{{ $fund }}/=</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @livewire('TotalIncome')

                    @livewire('TotalExpanse')

                    @livewire('TotalDue')
                </div>
            </div>
        </div>
    </div>
@endsection
