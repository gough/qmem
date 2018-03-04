<table class="table table-bordered table-hover table-responsive-md table-no-margin">
	<thead class="thead-default">
		<tr>
			<th>Created/Updated At</th>
			<th>User</th>
			<th>Action</th>
			<th>New Value</th>
			<th>Old Value</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($revisions as $revision)
		<tr>
			<td>{{ $revision->created_at->format('Y-m-d h:i:s A') }}</td>

			@if (!empty($revision->user_id))
				<td><a href="{{ route('users.view', $revision->userResponsible()->netid) }}">{{ $revision->userResponsible()->name }}</a></td>
			@else
				<td>SYSTEM</td>
			@endif

			@if ($revision->key == 'created_at')
				<td colspan="3">Create</td>
			@elseif ($revision->key == 'category_id')
				<td>Update 'category'</td>
	
				<?php
					$new_category = Category::find($revision->new_value);
					$old_category = Category::find($revision->old_value);
				?>

				@if (!empty($new_category))
					<td><a href="{{ route('categories.view', $revision->old_value) }}">{{ $new_category->name }}</a></td>
				@else
					<td><span class="text-muted">(deleted)</span></td>
				@endif

				@if (!empty($old_category))
					<td><a href="{{ route('categories.view', $revision->old_value) }}">{{ $old_category->name }}</a></td>
				@else
					<td><span class="text-muted">(deleted)</span></td>
				@endif
			@else
				<td>Update '{{ $revision->key }}'</td>
				<td>{{ $revision->new_value }}</td>
				<td>{{ $revision->old_value }}</td>
			@endif
		</tr>
		@endforeach
	</tbody>						
</table>