<table class="table table-bordered table-hover table-responsive-md table-no-margin">
	<thead class="thead-default">
		<tr>
			<th>Date</th>
			<th>User</th>
			<th>Action</th>
			<th>Field</th>
			@if (isset($show_item))
			<th>Item</th>
			@endif
			<th>New Value</th>
			<th>Old Value</th>
		</tr>
	</thead>
	<tbody>
		@if ($revisions->count() > 0)
			@foreach ($revisions as $revision)
				<tr>
					<!-- Date -->
					<td>{{ $revision->created_at->format('Y-m-d h:i:s A') }}</td>

					<!-- User -->
					@if (!empty($revision->user_id))
						<td><a href="{{ route('users.view', $revision->userResponsible()->netid) }}">{{ $revision->userResponsible()->name }}</a></td>
					@else
						<td>SYSTEM</td>
					@endif

					<!-- Action -->
					@if ($revision->key == 'created_at')
						<td>Create</td>
					@else
						<td>Update</td>
					@endif

					<!-- Field -->
					@if ($revision->key == 'created_at')
						<td class="text-muted">(n/a)</td>
					@elseif ($revision->key == 'name')
						<td>Name</td>
					@elseif ($revision->key == 'category_id')
						<td>Category</td>
					@elseif ($revision->key == 'status_id')
						<td>Status</td>
					@elseif ($revision->key == 'quantity')
						<td>Quantity</td>
					@elseif ($revision->key == 'minimum_quantity')
						<td>Minimum Quantity</td>
					@elseif ($revision->key == 'serial_number')
						<td>Serial Number</td>
					@elseif ($revision->key == 'item_number')
						<td>Item Number</td>
					@elseif ($revision->key == 'catalog_number')
						<td>Catalog Number</td>
					@elseif ($revision->key == 'custom_number')
						<td>Custom Number</td>
					@elseif ($revision->key == 'location')
						<td>Location</td>
					@elseif ($revision->key == 'price')
						<td>Price</td>
					@elseif ($revision->key == 'image_id')
						<td>Image</td>
					@elseif ($revision->key == 'notes')
						<td>Notes</td>
					@else
						<td>Update '{{ $revision->key }}'</td>
					@endif

					<!-- Item -->
					@if (isset($show_item))
						@if ($revision->revisionable_type == 'App\Asset') 
							<td><a href="{{ route('assets.view', $revision->revisionable_id) }}">Asset #{{ $revision->revisionable_id }}</a></td>
						@elseif ($revision->revisionable_type == 'App\Consumable')
							<td><a href="{{ route('consumables.view', $revision->revisionable_id) }}">Consumable #{{ $revision->revisionable_id }}</a></td>
						@elseif ($revision->revisionable_type == 'App\Category')
							<td><a href="{{ route('categories.view', $revision->revisionable_id) }}">Category #{{ $revision->revisionable_id }}</a></td>
						@endif
					@endif

					<!-- New value/Old value -->
					@if ($revision->key == 'created_at')
						<td>{{ $revision->new_value }}</td>
						<td class="text-muted">(n/a)</td>
					@elseif ($revision->key == 'category_id')
						<?php
							$new_category = Category::find($revision->new_value);
							$old_category = Category::find($revision->old_value);
						?>

						@if (!empty($new_category))
							<td><a href="{{ route('categories.view', $revision->new_value) }}">{{ $new_category->name }}</a></td>
						@else
							<td><span class="text-muted">(deleted)</span></td>
						@endif

						@if (!empty($old_category))
							<td><a href="{{ route('categories.view', $revision->old_value) }}">{{ $old_category->name }}</a></td>
						@else
							<td><span class="text-muted">(deleted)</span></td>
						@endif
					@elseif ($revision->key == 'status_id')
						<?php
							$new_status = Category::find($revision->new_value);
							$old_status = Category::find($revision->old_value);
						?>

						@if (!empty($new_status))
							<td><a href="{{ route('categories.view', $revision->new_value) }}">{{ $new_status->name }}</a></td>
						@else
							<td><span class="text-muted">(deleted)</span></td>
						@endif

						@if (!empty($old_status))
							<td><a href="{{ route('categories.view', $revision->old_value) }}">{{ $old_status->name }}</a></td>
						@else
							<td><span class="text-muted">(deleted)</span></td>
						@endif
					@elseif ($revision->key == 'image_id')
						<td class="text-muted">(n/a)</td>
						<td class="text-muted">(n/a)</td>
					@else
						@if (!empty($revision->new_value))
							<td>{{ $revision->new_value }}</td>
						@else
							<td class="text-muted">(not set)</td>
						@endif

						@if (!empty($revision->old_value))
							<td>{{ $revision->old_value }}</td>
						@else
							<td class="text-muted">(not set)</td>
						@endif
					@endif
				</tr>
			@endforeach
		@else
			<td class="text-center" colspan="6">{{ $no_found_error or "No revisions found."</td>
		@endif
	</tbody>		
</table>