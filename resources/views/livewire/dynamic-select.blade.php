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
                    <label for="expense_wey">মাধ্যম</label>
                    <select name="expense_wey" class="form-control" id="expense_wey" wire:model="selectedOption">
                        <option value="">মাধ্যম সিলেক্ট করুন</option>
                        <option {{old('expense_wey') == '1'?'selected':''}} value="1">দোকান</option>
                        <option {{old('expense_wey') == '0'?'selected':''}} value="0">শ্রমিক</option>
                    </select>
                    @error('expense_type')
                        <span class="text-danger">মাধ্যম সিলেক্ট করুন</span>
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
                    <input type="text" name="expense_amount" id="expense_amount" class="form-control" placeholder="১২০০০" value="{{old('expense_amount')}}">
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
