@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

<div class="form-group row">
	@php ($field = 'format')
	@php ($label = 'Format')
	@php ($placeholder = 'Pick a format...')
	@php ($value = 'csv')
	@php ($helptext = 'Specify the format you want to export to.')

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
