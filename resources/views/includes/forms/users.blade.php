@php ($label_classes = 'col-md-2 col-form-label')
@php ($field_classes = 'form-control')

<!-- User NetID -->
<div class="form-group row">
	@php ($field = 'netid')
	@php ($label = 'User NetID')
	@php ($placeholder = 'User NetID')
	@php ($value = isset($user->netid) ? $user->netid : null)
	@php ($helptext = 'Enter the unique NetID for the user.')

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

<!-- User Group -->
<div class="form-group row">
	@php ($field = 'group')
	@php ($label = 'User Group')
	@php ($placeholder = 'Pick a group...')
	@php ($value = isset($user->group_id) ? $user->group_id : 2)
	@php ($helptext = 'Select the group the user will belong to.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::select(
			$field, $groups, $value,
			['placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>

<hr>

<!-- Full Name -->
<div class="form-group row">
	@php ($field = 'name')
	@php ($label = 'Full Name')
	@php ($placeholder = '(automatically set)')
	@php ($value = isset($user->name) ? $user->name : null)
	@php ($helptext = 'The full name of the user. This value is automatically set based off the NetID entered.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::text(
			$field, $value,
			['disabled' => 'disabled',
			'placeholder' => $placeholder,
			'class' => $errors->first($field) ? $field_classes . ' border-danger' : $field_classes]
		) }}

		<small class="form-text {{ $errors->first($field) ? 'text-danger' : 'text-muted' }}">
			{{ $errors->first($field) ? $errors->first($field) : $helptext }}
		</small>
	</div>
</div>


<!-- Email -->
<div class="form-group row">
	@php ($field = 'email')
	@php ($label = 'Email')
	@php ($placeholder = '(automatically set)')
	@php ($value = isset($user->email) ? $user->email : null)
	@php ($helptext = 'The email address of the user. This value is automatically set based off the NetID entered.')

	{{ Form::label($field, $label, ['class' => $label_classes]) }}
	<div class="col-md-10">
		{{ Form::text(
			$field, $value,
			['disabled' => 'disabled',
			'placeholder' => $placeholder,
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
