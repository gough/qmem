@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

<!-- Assets -->
<div class="form-group row">
	@php ($field = 'assets')
	@php ($label = 'Assets')
	@php ($placeholder = 'Assets')
	@php ($value = null)
	@php ($helptext = 'Specify the ID for each asset you would like to print (seperated by commas). Enter "all" to print all assets or leave blank to print none.')

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

<!-- Consumables -->
<div class="form-group row">
	@php ($field = 'consumables')
	@php ($label = 'Consumables')
	@php ($placeholder = 'Consumables')
	@php ($value = null)
	@php ($helptext = 'Specify the ID for each consumable you would like to print (seperated by commas). Enter "all" to print all consumables or leave blank to print none.')

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

<hr>

<div class="form-group row">
	@php ($field = 'paper_size')
	@php ($label = 'Paper Size')
	@php ($placeholder = 'Pick a size...')
	@php ($value = 'label')
	@php ($helptext = 'Specify the paper size you want to print to.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::select(
			$field, $paper_sizes, $value, 
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
	<div class="offset-md-2 col-md-10">
		{{ Form::submit($button, ['class' => 'btn btn-primary']) }}
		<a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
	</div>
</div>
