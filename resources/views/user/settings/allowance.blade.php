@extends('master')
@section('title', 'System Setup')

@section('content')
@include('modals.allowance_modals')
@include('includes.custom_field_view')
<div class="container-fluid pt-4 mt-4">
    @if (Session::has('success_msg'))
        <div class="alert alert-success fade show" role="alert">
            {{session('success_msg')}}
        </div>
    @endif
    <div id="button_wrapper" class="small-6 columns pt-4 mt-4 mb-4"></div>
    <table class="table table-bordered" id="allowance-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Taxable?</th>
                @foreach($fields_value as $val)
                <th>{{$val->field_name}}</th>
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allowance as $all)
            <tr>
                <td>{{$all->name}}</td>
                <td>{{$all->description}}</td>
                @if($all->taxable == 1)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                @foreach($fields_value as $val)
                    @if($val->company_id == $all->id)
                        <td>{{$val->custom_value}}</td>
                    @else
                        <td>N/A</td>
                    @endif
                @endforeach
                <td>
                    <button class="company_edit btn btn-info" data-bs-toggle="modal" data-bs-target="#allowance" class="company_edit" data-name="{{$all->name}}" data-id="{{$all->id}}"  data-tax="{{$all->taxable}}"><i class="fa fa-edit"></i></button> 
                    <button class="company_delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#allowance"  data-id="{{$phealth->id}}"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <hr>
    @if($edit_roles == "edit")
    <div class = "row pt-4 mt-4">
        <div class = "col-12 text-right">
            <button type="button" class = "btn btn-info" data-bs-toggle="modal" data-bs-target="#allowance" style="color:white">Add New Allowance</button>
            <button type="button" class = "btn btn-warning add_custom_field" data-bs-toggle="modal"  data-table="allowance" data-bs-target="#custom_field">Add Custom Field</button>
        </div>
    </div>

    @endif
</div>

<script>
  $(document).ready(function() {
    var table = $('#allowance-table').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( $('#button_wrapper') );
} );
</script>
@endsection