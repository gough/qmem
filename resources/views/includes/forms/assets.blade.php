@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

<!-- Asset Name -->
<div class="form-group row">
	@php ($field = 'name')
	@php ($label = 'Asset Name')
	@php ($placeholder = 'Asset Name')
	@php ($value = isset($asset->name) ? $asset->name : null)
	@php ($helptext = 'Enter a unique name for the asset.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::text(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<!-- Category -->
<div class="form-group row">
	@php ($field = 'category')
	@php ($label = 'Category')
	@php ($placeholder = 'Pick a category...')
	@php ($value = isset($asset->category_id) ? $asset->category_id : 1)
	@php ($helptext = 'Pick a category for the asset.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::select(
			$field, $categories, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<!-- Status -->
<div class="form-group row">
	@php ($field = 'status')
	@php ($label = 'Status')
	@php ($placeholder = 'Pick a status...')
	@php ($value = isset($asset->status) ? $asset->status : 'available')
	@php ($helptext = 'Set the status of this asset.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::select(
			$field, $statuses, $value, 
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<hr>

<!-- Price -->
<div class="form-group row">
	@php ($field = 'price')
	@php ($label = 'Price')
	@php ($placeholder = 'Price')
	@php ($value = isset($asset->price) ? $asset->price : null)
	@php ($helptext = 'Enter the price of the asset.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">$</div>
			</div>
			{{ Form::number(
				$field, $value,
				['placeholder' => $placeholder,
				'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes,
				'step' => '0.01']
			) }}
		</div>

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>


<!-- Location -->
<div class="form-group row">
	@php ($field = 'location')
	@php ($label = 'Location')
	@php ($placeholder = 'Location')
	@php ($value = isset($asset->location) ? $asset->location : null)
	@php ($helptext = 'Enter the location where the asset can be found.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::text(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<!-- Image -->
<div class="form-group row">
	@php ($field = 'image')
	@php ($label = 'Image')
	@php ($placeholder = 'Image')
	@php ($value = isset($asset->image_id) ? $asset->image_id : null)
	@php ($helptext = 'Upload an image that best represents the asset. If an image already exists, uploading will overwrite the existing one.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		@if (!empty($asset->image_id))
			<img class="img-fluid mb-2 p-2 border rounded" width="200" src="/img/{{ $asset->image_id }}">
		@endif
		{{ Form::file(
			$field,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<hr>

<div class="form-group row">
	@php ($field = 'notes')
	@php ($label = 'Notes')
	@php ($placeholder = 'Notes')
	@php ($value = isset($asset->notes) ? $asset->notes : null)
	@php ($helptext = 'Add any additional information that isn\'t covered above. This field also supports <a href="https://en.wikipedia.org/wiki/Markdown">Markdown</a>.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::textarea(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{!! $errors->first($field) ? $errors->first($field) : $helptext !!}
		</small>
	</div>
</div>

<hr>

<div class="form-group row">
	<div class="offset-md-2 col-md-10">
		{{ Form::submit($button, ['class' => 'btn btn-primary']) }}
		<a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
	</div>
</div>
