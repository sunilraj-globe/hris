@extends('master')
@section('title', 'System Setup')

@section('content')
@include('modals.company_modals')
@include('includes.custom_field_view')
<div class="container-fluid pt-4 mt-4">
    @if (Session::has('success_msg'))
        <div class="alert alert-success fade show" role="alert">
            {{session('success_msg')}}
        </div>
    @endif
    <div id="button_wrapper" class="small-6 columns pt-4 mt-4 mb-4"></div>
    <table class="table table-bordered" id="branch-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>address</th>
                @foreach($fields_value as $val)
                <th>{{$val->field_name}}</th>
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branch as $brc)
            <tr>
                <td>{{$brc->name}}</td>
                <td>{{$brc->address}}</td>

                @foreach($fields_value as $val)
                    @if($val->company_id == $brc->id)
                        <td>{{$val->custom_value}}</td>
                    @else
                        <td>N/A</td>
                    @endif
                @endforeach
                <td><button data-bs-toggle="modal" data-bs-target="#branch" class="branch_edit" data-name="{{$brc->name}}" data-address="{{$brc->address}}"></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <hr>
    @if($edit_roles == "edit")
    <div class = "row pt-4 mt-4">
        <div class = "col-12 text-right">
            <button type="button" class = "btn btn-info" data-bs-toggle="modal" data-bs-target="#branch" style="color:white">Add New Company</button>
            <button type="button" class = "btn btn-warning add_custom_field" data-bs-toggle="modal"  data-table="branch" data-bs-target="#custom_field">Add Custom Field</button>
        </div>
    </div>

    @endif
</div>

<script>
  $(document).ready(function() {
    var table = $('#branch-table').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( $('#button_wrapper') );
} );

    $(".branch_edit").click(function(){
        $("[name='name']").val($(this).data("name"));
        $("[name='address']").val($(this).data("address"));
    });
</script>
@endsection