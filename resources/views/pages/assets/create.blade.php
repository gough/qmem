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
					<form method="POST" action="{{ route('assets.store') }}">
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="type" class="col-md-2 col-form-label">Asset Type</label>
							<div class="col-md-10">
								<select class="form-control" name="type" id="type">
									<option value="active">Capital</option>
									<option value="active">Consumable</option>
								</select>
							</div>
						</div>
						<hr>
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
						<hr>
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
								<input type="text" name="serial-number" id="serial-number" class="form-control" placeholder="Serial Number">
							</div>
						</div>
						<div class="form-group row">
							<label for="field2" class="col-md-2 col-form-label">Field 2</label>
							<div class="col-md-10">
								<input type="text" name="field2" id="field2" class="form-control" placeholder="Field 2">
							</div>
						</div>
						<div class="form-group row">
							<label for="field3" class="col-md-2 col-form-label">Field 3</label>
							<div class="col-md-10">
								<input type="text" name="field3" id="field3" class="form-control" placeholder="Field 3">
							</div>
						</div>
						<div class="form-group row">
							<label for="field4" class="col-md-2 col-form-label">Field 4</label>
							<div class="col-md-10">
								<input type="text" name="field4" id="field4" class="form-control" placeholder="Field 4">
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