@extends('master.admin.master')

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default Datatable</h4>
                <p class="card-title-desc">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($subcategories as $subcategory)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td>
                                <img src="{{asset($subcategory->image)}}" alt="" height="50" width="80" />
                            </td>
                            <td>{{$subcategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                            <a href="{{route('subcategory.edit', ['id' => $subcategory->id])}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('subCategoryDeleteForm{{$subcategory->id}}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form action="{{route('subcategory.delete', ['id' => $subcategory->id])}}" method="POST" id="subCategoryDeleteForm{{$subcategory->id}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection