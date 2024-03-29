@extends('admin_layout')
@section('admin_content')
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Update Products</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					  <h2><i class="halflings-icon edit"></i><span class="break"></span>Update product</h2>	
					</div>
					<p class="alert-success">
						<?php
						$message=Session::get('message');
						if ($message) {

							echo $message;
							Session::put('message',null);
						}

						?>
					</p>
					
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/update-product',$product_info ->product_id) }}" method="post">
							{{ csrf_field() }}	

						  <fieldset>							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
							<input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
							  </div>
							</div>	

							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
								  	<option>select one</option>

							 <?php 
                                $all_published_category=DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();
                                foreach($all_published_category as $v_category){ ?>
									<option value="{{$v_category->category_id}}"> {{$v_category->category_name}} </option>
							<?php } ?>

								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
									<option>select one</option>

							<?php 
                                $all_published_manufacture=DB::table('tbl_manufacture')
                                                           ->where('publication_status',1)
                                                           ->get();
                                foreach($all_published_manufacture as $v_manufacture){ ?>
                                <option value="{{$v_manufacture->manufacture_id}}"> {{$v_manufacture->manufacture_name}} </option>
                            <?php } ?>    
								  </select>
								</div>
							  </div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea {{-- class="cleditor" --}}style="height: 150px; width: 500px;" name="product_short_description" rows="3" >
								{{$product_info->product_short_description}}
								</textarea>
							  </div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea style="height: 150px; width: 500px;" name="product_long_description" rows="3" required=""></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  <input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">save</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection