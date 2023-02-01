@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Category Management</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href=""> Create New Category</a>
            </div>


        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-primary">
                <th>Category</th>
                <th style="width:30%">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tee Shirt</td>
                <td>
                    <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span
                            class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection


