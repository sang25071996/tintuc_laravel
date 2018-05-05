@extends('backend.master')
@section('title','Trang category edit')
@section('content')
<form action="" method="POST" style="width: 650px;">
	{{ csrf_field() }}
	<fieldset>
		<legend>Thông Tin Danh Mục</legend>
		<br />
{{-- 		{{ dd($data) }} --}}
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<input type="text" name="txtCateName" class="textbox" value="{{ old('txtCateName',$data['name']) }}" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnCateEdit" value="Sửa danh mục" class="button" />
		</span>
	</fieldset>
</form>  
@endsection