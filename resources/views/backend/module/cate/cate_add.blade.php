@extends('backend.master')
@section('title','Trang category add')
@section('content')

<form action="" method="POST" style="width: 650px;">
	{{ csrf_field() }}
	<fieldset>
		<legend>Thông Tin Danh Mục</legend>

		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<input type="text" name="txtCateName" class="textbox" value="{{ old('txtCateName') }}" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnCateAdd" value="Thêm danh mục" class="button" />
		</span>
	</fieldset>
</form>  
</div>
@endsection