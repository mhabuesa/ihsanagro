@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $sl=> $user )

                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('user.delete', $user->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Users</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf

                        <div class="mt-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email@gmail.com">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-dark" type="submit">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
@if (session('message'))
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
    title: "{{session('message')}}"
    });
</script>
@endif
@endpush
