
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
                                {{ __('admin.admins') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--  -->
                	<!--begin::Portlet-->
						<div class="m-portlet">
							
							<div class="m-portlet__body">
								<!--begin::Section-->
								
								
						<div class="m-section__content">
								<div class="table-responsive">
									<table class="table table-bordered">
                                    <thead>
                        <tr>
                        <th>#</th>
                                <th>Country</th>
								<th>selected</th>
                                <th>Operation</th>
                            
                        </tr>
                        </thead>
                        
										<tbody>
                                        @foreach($data as $value)
											<tr>
												<td>
													{{$value->id}}
												</td>
												<td>
                                                {{$value->country_name}}
												</td>
												<td>
                                                {{$value->selected}}
												</td>
												
												<td>
                                                <a href="studentcountry/{{$value->id}}/edit"><button type="button" class="btn btn-primary" >Edite</button></a>
												</td>	
											</tr>
 
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

