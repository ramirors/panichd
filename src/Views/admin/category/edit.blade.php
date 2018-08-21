@extends($master)
@section('page', trans('panichd::admin.category-edit-title', ['name' => ucwords($category->name)]))

@include('panichd::shared.common')
@include('panichd::shared.colorpicker', [
	'include_colorpickerplus_script' => true,
	'input_color' => $category->color
])

@section('panichd_assets')
	<style type="text/css">
		#tag-panel .fa {
			color: #777;
		}
		
		#jquery_popup_tag_input {
			border: transparent;
			box-shadow: none;
		}
	</style>
@append

@section('content')	
	<div class="well bs-component">
        {!! CollectiveForm::model($category, [
			'route' => [$setting->grab('admin_route').'.category.update', $category->id],
			'method' => 'PATCH',
			'class' => 'form-horizontal'
			]) !!}
        <legend>{{ trans('panichd::admin.category-edit-title', ['name' => ucwords($category->name)]) }}</legend>
        @include('panichd::admin.category.form', ['update', true])
		@include('panichd::admin.category.modal-email')
        {!! CollectiveForm::close() !!}
    </div>
	@include('panichd::admin.category.modal-reason')
	@include('panichd::admin.category.modal-tag')
@stop

@section('footer')
	@include('panichd::admin.category.scripts-create-edit')
	@include('panichd::admin.category.scripts-edit')
@append
