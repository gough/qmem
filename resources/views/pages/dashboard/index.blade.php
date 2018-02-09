@extends('layouts.default')
@section('content')
	<h1>Dashboard</h1>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="card border-primary">
				<div class="card-info-top bg-primary">
					<div class="pull-left">
						<i class="fa fa-cube fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">10.1k</span>
						<span class="card-desc">Total Assets</span>
					</div>
				</div>
				<a class="card-button-bottom text-primary" href="">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-success">
				<div class="card-info-top bg-success">
					<div class="pull-left">
						<i class="fa fa-tint fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">2,222</span>
						<span class="card-desc">Total Consumables</span>
					</div>
				</div>
				<a class="card-button-bottom text-success" href="">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-warning">
				<div class="card-info-top bg-warning">
					<div class="pull-left">
						<i class="fa fa-bell-o fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">31</span>
						<span class="card-desc">Total Alerts</span>
					</div>
				</div>
				<a class="card-button-bottom text-warning" href="">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-danger">
				<div class="card-info-top bg-danger">
					<div class="pull-left">
						<i class="fa fa-user-circle-o fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">12</span>
						<span class="card-desc">Total Users</span>
					</div>
				</div>
				<a class="card-button-bottom text-danger" href="">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Recent Activity</span>
				</div>
				<div class="card-body">
					<div class="pull-left d-none d-sm-block">
						<span class="pagination-detail">Showing 1 to 20 of 10,123 rows</span>
					</div>
					<div class="pull-right">
						<nav aria-label="Page navigation">
							<ul class="pagination justify-content-end">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
					</div>
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th style="width: 25%">Date</th>
								<th style="width: 20%">User</th>
								<th style="width: 15%">Action</th>
								<th style="width: 40%">Item</th>
								<!--<th class="hidden-xs" style="width: 1%" colspan="2">Item</th>
								<th style="width: 44%">Item</th>-->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-cube"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Yellow (7449940328)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Red (6190071664)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Yellow (7449940328)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Red (6190071664)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-cube"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Yellow (7449940328)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Red (6190071664)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Yellow (7449940328)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Red (6190071664)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Blue (1830711520)</a></td>
							</tr>
							<tr>
								<td>2017-12-12 12:12:12 PM</td>
								<td><a href="#">John Smith</a></td>
								<td>Update</td>
								<td><i class="fa fa-tint"></i> <a href="#"> Syringe 4" Green (4394212424)</a></td>
							</tr>
						</tbody>						
					</table>
					<div class="pagination">
						<div class="pull-left col">
							<span class="pagination-detail align-middle d-none d-sm-block">
								Showing 1 to 20 of 1234 rows
							</span>
						</div>
						<div class="pull-right col">
							<nav aria-label="Page navigation">
								<ul class="pagination justify-content-end">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Previous</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
						</div>									
					</div>
				</div>
			</div>
		</div>
	</div>
@stop