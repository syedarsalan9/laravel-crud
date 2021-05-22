@extends('layouts.post')

@section('content')
<div class="container">
    <div id="toasts"></div>
    <h1>Laravel Task</h1>
    <div style="display: flex;text-align: center;margin-bottom: 50px;">
        <a class="btn btn-success" href="javascript:void(0)" id="createNewRecord"> Create</a>
        <form method="GET" action="{{ url('tasks') }}">
            <div class="input-group">
                <input type="text" class="input-sm form-control" name="keywords" placeholder="Search" value="{{ request()->keywords }}">
                <span class="input-group-btn">
                    <input class="btn btn-sm btn-default" type="submit" value="Go!">
                </span>
            </div>
        </form>
        
        <div class="select" style="margin-left: auto">
            <select name="sort" id="slct">
                <option selected disabled>Sort</option>
                <option value="id">ID</option>
                <option value="type">Type</option>
                <option value="name">Name</option>
                <option value="magento_id">Magento ID</option>
            </select>
        </div>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">Type<span id="id_icon"></span></th>
                <th>Name</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="post_title" style="cursor: pointer">magento_id<span id="post_title_icon"></th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody class='record-table-body'>
            @foreach($records as $record)
            <tr class="row-{{ $record->id }}">
                <td>{{ $record->type }}</td>
                <td>{{ $record->NAME }}</td>
                <td>{{  $record->magento_id}}</td>
                <td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$record->id}}" data-original-title="Edit" class="edit btn btn-primary btn-sm editRecord">Edit</a><a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$record->id}}" data-original-title="Delete" class="btn btn-danger btn-sm deleteRecord">Delete</a></td>
            </tr>
            @endforeach
            <tr>
               <td colspan="3" align="center">
                {!! $records->links() !!}
               </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
</div>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="recordForm" name="recordForm" class="form-horizontal">
                    @csrf
                   <input type="hidden" name="record_id" id="record_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="type" name="type" placeholder="Enter Type" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <textarea id="name" name="name" required="" placeholder="Enter Name" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Magento Id</label>
                        <div class="col-sm-12">
                            <textarea id="magento_id" name="magento_id" required="" placeholder="Enter Magento Id" class="form-control"></textarea>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection