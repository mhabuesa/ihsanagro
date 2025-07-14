@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3> নতুন মৌসুম</h3>
        </div>
        <div class="card-body">
            <form action="{{route('season.update', $season->id)}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-sm-4 ">
                        <label class="control-label" for="input-name">মৌসুমের নাম</label>
                        <input type="text" name="season_name" value="{{$season->name}}" id="input-name" class="form-control" required>
                        @error('season_name')
                            <small class="text-danger">মৌসুমের নাম লিখুন</small>
                        @enderror
                    </div>


                    <div class="col-sm-4">
                        <label class="control-label" for="input-start_date">শুরুর তারিখ</label>
                        <input type="date" name="start_date" id="input-start_date" value="{{$season->start_date}}" class="form-control" required>
                        @error('start_date')
                            <small class="text-danger">শুরুর তারিখ লিখুন</small>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label" for="input-end_date">শেষের তারিখ</label>
                        <input type="date" name="end_date" id="input-end_date" value="{{$season->end_date}}" class="form-control" required>
                        @error('end_date')
                            <small class="text-danger">শেষের তারিখ লিখুন</small>
                        @enderror
                    </div>
                </div>



                <div class="row">

                <div class="col-sm-12 ">
                    <label>সার্বিক মন্তব্য</label>
                    <input type="text" id="comments" name="comments" value="{{$season->comment}}" class="form-control">
                </div>

                </div>

                <div class="col-sm-12 d-flex justify-content-between " style="margin-top: 10px;">

                    <a href="{{route('season')}}" class="btn btn-danger btn-lg">তালিকা</a>
                    <button type="submit" class="btn btn-success btn-lg pull-right">সাবমিট</button>

                </div>



            </form>
        </div>
    </div>
@endsection

