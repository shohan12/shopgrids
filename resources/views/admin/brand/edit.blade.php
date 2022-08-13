@extends('master.admin.master')

@section('body')
<div class="row">
<div class="col-lg-12">
                              <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Category Form</h4>
                                        <p class="text-success text-center">{{Session::get('message')}}</p>
                                        <form action="{{route('brand.update',['id'=>$brand->id])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name='name' value="{{$brand->name}}" id="horizontal-firstname-input">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand Description</label>
                                                <div class="col-sm-9">
                                                    <textarea  class="form-control"  name='description' id="horizontal-email-input">{{$brand->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Brand Image</label>
                                                <div class="col-sm-9">
                                                  <input type="file" name='image' class="form-control-file" id="horizontal-password-input"/>
                                                  <img src="{{asset($brand->image)}}" alt=""  height='100' width="150">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-end">
                                                <div class="col-sm-9">
                                        
                                                    <div>
                                                        <button type="submit" class="btn btn-primary w-md">Update Brand Info</button>
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
