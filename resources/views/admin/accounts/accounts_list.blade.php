@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title or '' }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                               <th>Name</th>
                                <th>Business number</th>
                               <th>Tax number</th>
                                 <th>country</th>
                                 <th>Industry</th>   
                                  <th>Package</th>
                                   <th>Is Active</th>
                                   <th>Is suspended</th>
                                    <th>Holder</th>
                                    <th>Users</th>
                                    <th>Action</th>
                                
                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Business number</th>
                               <th>Tax number</th>
                                 <th>country</th>
                                 <th>Industry</th>   
                                  <th>Package</th>
                                   <th>is Active</th>
                                   <th>Is suspended</th>
                                    <th>Holder</th>
                                    <th>Users</th>
                                    <th>Action</th>

                                
                            
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($accounts))
                            @foreach ($accounts as $row)
                            <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->business_number}}</td>
                            <td>{{$row->tax_number}}</td>
                            <td> @foreach($countries as $ind)
                             @if($ind->id==$row->country)
                             {{$ind->name}}
                             @endif
                              @endforeach
                             </td>
                             <td>
                               @foreach($indestrys as $ind)
                                 @if($ind->id==$row->industry_id)

                                 {{$ind->name}}
                                    
                                 @endif
                               @endforeach
                             </td>
                             <td>
                              @foreach($packages as $pkg)
                                  @if($pkg->id==$row->package_id)  
                                    {{$pkg->name}} 
                                  @endif
                                 
                              @endforeach
                               
                             </td>
                             <td> @if($row->is_active) True @else False @endif</td>
                              <td> @if($row->is_suspended) True @else False @endif</td>
                              <td> {{$row->holder->first_name}}</td>
                              <td> {{count($row->users)}}</td>
                              <td>
                                <a href="{{ route('accounts.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
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
</div>

@stop