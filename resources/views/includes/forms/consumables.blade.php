@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

{{ Form::hidden('next', url()->previous()) }}

<!-- Consumable Name -->
<div class="form-group row">
	@php ($field = 'name')
	@php ($label = 'Consumable Name')
	@php ($placeholder = 'Consumable Name')
	@php ($value = isset($consumable->name) ? $consumable->name : null)
	@php ($helptext = 'Enter a unique name for this consumable.')

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
	@php ($helptext = 'Pick a category for this consumable.')

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

<!-- Quantity -->
<div class="form-group row">
	@php ($field = 'quantity')
	@php ($label = 'Quantity')
	@php ($placeholder = 'Quantity')
	@php ($value = isset($consumable->quantity) ? $consumable->quantity : null)
	@php ($helptext = 'Enter the amount of this consumable.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	
	<div class="col-md-5">
		{{ Form::number(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>

	@php ($field = 'minimum_quantity')
	@php ($placeholder = 'Minimum Quantity')
	@php ($value = isset($consumable->minimum_quantity) ? $consumable->minimum_quantity : 0)
	@php ($helptext = 'Enter the minimum allowable amount of this consumable.')

	<div class="col-md-5 mt-3 mt-md-0">
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
	@php ($field = 'identifiers')
	@php ($label = 'Identifiers')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}

	@php ($field = 'item_number')
	@php ($placeholder = 'Item Number')
	@php ($value = isset($consumable->item_number) ? $consumable->item_number : null)
	@php ($helptext = 'Enter the item number for this consumable.')

	<div class="col-md-4">
		{{ Form::text(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>

	@php ($field = 'catalog_number')
	@php ($placeholder = 'Catalog Number')
	@php ($value = isset($consumable->catalog_number) ? $consumable->catalog_number : null)
	@php ($helptext = 'Enter the catalog number.')

	<div class="col-md-3 mt-3 mt-md-0">
		{{ Form::text(
			$field, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>

	@php ($field = 'custom_number')
	@php ($placeholder = 'Custom Number')
	@php ($value = isset($consumable->custom_number) ? $consumable->custom_number : null)
	@php ($helptext = 'Enter any other indentifing number.')

	<div class="col-md-3 mt-3 mt-md-0">
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

<!-- Location -->
<div class="form-group row">
	@php ($field = 'location')
	@php ($label = 'Location')
	@php ($placeholder = 'Location')
	@php ($value = isset($consumable->location) ? $consumable->location : null)
	@php ($helptext = 'Enter the location where this consumable can be found.')

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

<!-- Price -->
<div class="form-group row">
	@php ($field = 'price')
	@php ($label = 'Price')
	@php ($placeholder = 'Price')
	@php ($value = isset($consumable->price) ? $consumable->price : null)
	@php ($helptext = 'Enter the price of this consumable.')

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

<!-- Image -->
<div class="form-group row">
	@php ($field = 'image')
	@php ($label = 'Image')
	@php ($placeholder = 'Image')
	@php ($value = isset($consumable->image_id) ? $consumable->image_id : null)
	@php ($helptext = 'Upload an image that best represents this consumable. If an image already exists, uploading will overwrite the existing one.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		@if (!empty($consumable->image_id))
			<img class="img-fluid mb-2 p-2 border rounded col-md-5" src="{{ config('app.url') . 'img/' . $consumable->image_id }}">
			<div class="form-check form-control p-2 col-md-5">
				{{ Form::checkbox(
					'delete_image', true, false,
					['class' => 'form-check-input ml-1',
					'onclick' => 'document.getElementById(\'image_chooser\').disabled=this.checked;',
					'id' => 'delete_image']
				) }}
				{{ Form::label('delete_image', 'Delete this image', ['class' => 'form-check-label ml-4']) }}
			</div>
			<hr>
		@endif

		{{ Form::file(
			$field,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes,
			'id' => 'image_chooser']
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

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
