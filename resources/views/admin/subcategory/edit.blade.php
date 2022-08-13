
@extends('master.admin.master')

@section('body')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Sub Category Form</h4>
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <form action="{{route('subcategory.update', ['id' => $subcategory->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Category name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name='category_id'>
                                <option>--Select Category Name--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"{{$category->id==$subcategory->category_id ?'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$subcategory->name}}" name='name' id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="horizontal-email-input">{{$subcategory->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Sub Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name='image' class="form-control-file" id="horizontal-password-input" />
                            <img src="{{asset($subcategory->image)}}" alt="" srcset="" height="80" width="120">
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update New Sub Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection