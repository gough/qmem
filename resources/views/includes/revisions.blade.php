<table class="table table-bordered table-hover table-responsive-md table-no-margin">
	<thead class="thead-default">
		<tr>
			<th>Created/Updated At</th>
			<th>User</th>
			<th>Action</th>
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
					<td>{{ $revision->created_at->format('Y-m-d h:i:s A') }}</td>

					@if (!empty($revision->user_id))
						<td><a href="{{ route('users.view', $revision->userResponsible()->netid) }}">{{ $revision->userResponsible()->name }}</a></td>
					@else
						<td>SYSTEM</td>
					@endif

					@if ($revision->key == 'created_at')
						<td>Create</td>
					@elseif ($revision->key == 'category_id')
						<td>Update 'category'</td>
					@else
						<td>Update '{{ $revision->key }}'</td>
					@endif

					@if (isset($show_item))
						@if ($revision->revisionable_type == 'App\Asset') 
							<td><a href="{{ route('assets.view', $revision->revisionable_id) }}">Asset #{{ $revision->revisionable_id }}</a></td>
						@elseif ($revision->revisionable_type == 'App\Consumable')
							<td><a href="{{ route('consumables.view', $revision->revisionable_id) }}">Consumable #{{ $revision->revisionable_id }}</a></td>
						@elseif ($revision->revisionable_type == 'App\Category')
							<td><a href="{{ route('categories.view', $revision->revisionable_id) }}">Category #{{ $revision->revisionable_id }}</a></td>
						@endif
					@endif

					@if ($revision->key == 'created_at')
						<td class="text-muted">(not applicable)</td>
						<td class="text-muted">(not applicable)</td>
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
					@else
						<td>{{ $revision->new_value }}</td>
						<td>{{ $revision->old_value }}</td>
					@endif
				</tr>
			@endforeach
		@else
			<td class="text-center" colspan="6">{{ $no_found_error or "No revisions found." </td>
		@endif
	</tbody>		
</table>