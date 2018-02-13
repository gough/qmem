@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>New Asset</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form>
						<div class="form-group row">
							<label for="name" class="col-md-2 col-form-label">Asset Name</label>
							<div class="col-md-10">
								<input type="text" name="name" id="name" class="form-control" placeholder="Asset Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="serial-number" class="col-md-2 col-form-label">Asset Tag</label>
							<div class="col-md-10">
								<input type="text" name="serial-number" id="serial-number" class="form-control" placeholder="(automatically generated)" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-md-2 col-form-label">Status</label>
							<div class="col-md-10">
								<select class="form-control" name="status" id="status">
									<option value="active">Active</option>
									<option value="active">Inactive</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="serial-number" class="col-md-2 col-form-label">Serial Number</label>
							<div class="col-md-10">
								<input type="text" id="serial-number" class="form-control" placeholder="Serial Number">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<div class="offset-md-2 col-md-10">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
								<button type="button" class="btn btn-secondary">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop