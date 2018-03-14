@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

<!-- Consumable Name -->
<div class="form-group row">
	@php ($field = 'name')
	@php ($label = 'Consumable Name')
	@php ($placeholder = 'Consumable Name')
	@php ($value = isset($consumable->name) ? $consumable->name : null)
	@php ($helptext = 'Enter a unique name for the consumable.')

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
	@php ($value = isset($consumable->category_id) ? $consumable->category_id : 1)
	@php ($helptext = 'Pick a category for the consumable.')

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
	@php ($value = isset($consumable->status) ? $consumable->status : 'available')
	@php ($helptext = 'Set the status of this consumable.')

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

<!-- Quantity -->
<div class="form-group row">
	@php ($field = 'quantity')
	@php ($label = 'Quantity')
	@php ($placeholder = 'Quantity')
	@php ($value = isset($consumable->quantity) ? $consumable->quantity : null)
	@php ($helptext = 'Enter the initial amount of this consumable. This can be changed after creation.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::number(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>
<!-- Price -->
<div class="form-group row">
	@php ($field = 'price')
	@php ($label = 'Price')
	@php ($placeholder = 'Price')
	@php ($value = isset($consumable->price) ? $consumable->price : null)
	@php ($helptext = 'Enter the price of the consumable.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::number(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>
<hr>

<!-- Location -->
<div class="form-group row">
	@php ($field = 'location')
	@php ($label = 'Location')
	@php ($placeholder = 'Location')
	@php ($value = isset($consumable->location) ? $consumable->location : null)
	@php ($helptext = 'Enter the location where the consumable can be found.')

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
	@php ($value = isset($consumable->image_id) ? $consumable->image_id : null)
	@php ($helptext = 'Upload an image that best represents the consumable. If an image already exists, uploading will overwrite the existing one.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		@if (!empty($consumable->image_id))
			<img class="img-fluid mb-2 p-2 border rounded" width="200" src="/img/{{ $consumable->image_id }}">
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
	@php ($value = isset($consumable->notes) ? $consumable->notes : null)
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
