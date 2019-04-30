
@extends('general::layouts.admin')

@section('title',__('admin.admins'))

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
							Student
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button onclick="window.location='{{ route('student.create') }}'"
                                        class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add</span>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--  -->
				<div class="m-portlet">
									
									<div class="m-portlet__body">
										<ul class="nav nav-tabs  m-tabs-line" role="tablist">
										@foreach($countries as $country)
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link " data-toggle="tab" href="#{{$country->country_name}}" role="tab">
												{{$country->country_name}}
												</a>
											</li>
											@endforeach
										</ul>
										<div class="tab-content">
											<div class="tab-pane active show" id="{{$country->country_name}}" role="tabpanel">
											<div class="m-section__content">
								<div class="table-responsive">
									<table class="table table-bordered">
                                    <thead>
                        <tr>
                        <th>#</th>
						
                                <th>studentName</th>
								<th>CountryName</th>
								<th>CityName</th>
								<th>StageName</th>
								<th>SchooleName</th>
                                <th>Operation</th>
                            
                        </tr>
                        </thead>
						@foreach($data as $value)
										<tbody>
                                      
										
											<tr>
												<td>
													{{$value->id}}
												</td>
												
												<td>
                                                {{$value->student_name}}
												</td>
											
												<td>
                                                {{$value->countries->country_name}}
												</td>
												<td>
                                                {{$value->cities->city_name}}
												</td>
												<td>
												{{$value->stages->stage_name}}
												</td>
												<td>
												{{$value->schooles->schoole_name}}
												</td>
												<td>
                                                <a href="student/{{$value->id}}/edit"><button type="button" class="btn btn-primary" >Edite</button></a>
							                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" >Delete</button>
												</td>
												
											</tr>
                                            <div class="modal model-danger fade" id="delete" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
					      </div>

					       <form action="{{route('student.destroy',$value->id)}}" method="post">
					        <div class="modal-body">
					         {{method_field('delete')}}
					     	 {{csrf_field()}}
			          			<div>
			            			<div class="box-body">
			            			<p class="text-center">Are u sure want to delete ?</p>
			          			
			              				
			            			</div>
			          			</div>
					      	</div>
					      		<div class="modal-footer">
					        	<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">No, cancel</button>
					        	<button type="submit" class="btn btn-success">Yes, Delete</button>
					      		</div>
					      </form>
											</div>
										</div>
									</div>
								</div>
				<!--  -->
                	<!--begin::Portlet-->
						<!-- <div class="m-portlet">
							
							<div class="m-portlet__body">
								begin::Section -->
								
								
				
										@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end::Section-->
                <!--  -->
            

                   
                </div>
            </div>
        </div>
    </div>

   
@endsection

