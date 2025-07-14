@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-8 mt-3">
            <div class="card table-responsive">
                <div class="card-header">
                    <h3 class="text-center">নোট বিবরণ</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>নং</th>
                            <th>নোট</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($notes as $sl=> $note )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$note->title}}</td>
                                <td>
                                    <a  class="mt-2 btn btn-info" data-bs-toggle="modal" data-bs-target="#referAndEarn{{$note->id}}">Show</a>
                                    <a href="{{route('note.edit', $note->id)}}" class="mt-2 btn btn-success">Edit</a>
                                    <button class="mt-2 btn btn-danger delete-button" data-id="{{ $note->id }}">Delete</button>
                                </td>
                            </tr>



                            <!-- Refer & Earn Modal -->
                        <div class="modal fade" id="referAndEarn{{$note->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-refer-and-earn">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="mb-2">নোট বিবরণ</h3>

                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-4 px-4">
                                        <p>{{$note->note}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--/ Refer & Earn Modal -->


                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-3">
            <div class="card table-responsive">
                <div class="card-header">
                    <h3 class="text-center">নোট যুক্ত করুন</h3>
                </div>
                <div class="card-body">
                   <form action="{{route('note.store')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="title" class="form-label">টাইটেল লিখুন</label>
                       <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="mt-3">
                        <label for="note" class="form-label">নোট লিখুন</label>
                        <textarea name="note" id="note" class="form-control" cols="30" rows="10" ></textarea>
                    </div>

                    <div class="mt-3 d-flex justify-content-end" >
                        <button class="btn btn-primary">যুক্ত করুন</button>
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
@if (session('delete'))
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
    title: "{{session('delete')}}"
    });
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                Swal.fire({
                    title: "আপনি কি মুছে ফেলতে চান?",
                    text: "আপনি এটিকে ফিরিয়ে আনতে পারবেন না!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/note/delete/${itemId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "ডিলেট!",
                                    text: "মুছে ফেলা হয়েছে।",
                                    icon: "success"
                                }).then(() => {
                                    // Optionally, refresh the page or remove the deleted item from the DOM
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "There was a problem deleting the item.",
                                    icon: "error"
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the item.",
                                icon: "error"
                            });
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
