@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">
		@if($errors->any())
			<h4>{{$errors->first()}}</h4>
		@endif

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Modules <a href="{{ url('/module/add') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New Module</a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($modules))
								@foreach ($modules as $row)
								<tr>
									<td>{{$row->name}}</td>
									<td>
										<a href="{{ url('/module/edit') }}/{{$row->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
										<a href="#!" onclick="delete_item({{$row->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
									</td>
								</tr>
								@endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	
	
	
	<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					<h4 id="modal_title" ></h4>
                </div>
                <div class="modal-body">
                    <div class="widget-container fluid-height clearfix">
                        <div id="content_modal" class="widget-content padded">

							Are You Sure ?
							<div class="form-group modal-footer">
								<div class="col-md-6">
									<a id="confirm_delete_button" type="button" class="btn btn-primary"
											>Go</a>
									<button id="cancel_modal"
											class="btn btn-default-outline cancel"
											class="btn btn-secondary"
											data-dismiss="modal">Cancel</button>
								</div>
							</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal -->

	
</div>
<script>
	function delete_item(id){
        $('#myModal').modal('show');
        $('#confirm_delete_button').attr('href',"{{ url('/module/delete') }}/"+id);
	}
</script>







@stop