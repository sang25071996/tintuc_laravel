@extends('backend.master')
@section('title','Trang news add')
@section('content')

<div id="main">
	<form  method="POST" enctype="multipart/form-data" style="width: 650px;">
		{{ csrf_field() }}
		<fieldset>
			<legend>Thông Tin Bản Tin</legend>
			<span class="form_label">Tên danh mục:</span>
			<span class="form_item">
				<select name="sltCate" class="select">
					<option value="">Chọn danh mục</option>
					@foreach($category as $item)
						<option value="{{ $item['id'] }}" {{ (old('sltCate') == $item['id']) ? "selected" : "" }}>{{ $item['name'] }}</option>
					@endforeach
				</select>
			</span><br />
			<span class="form_label">Tiêu đề tin:</span>
			<span class="form_item">
				<input type="text" name="txtTitle" class="textbox" value="{{ old('txtTitle') }}" />
			</span><br />
			<span class="form_label">Tác gỉả:</span>
			<span class="form_item">
				<input type="text" name="txtAuthor" class="textbox" value="{{ old('txtAuthor') }}" />
			</span><br />
			<span class="form_label">Trích dẫn:</span>
			<span class="form_item">
				<textarea name="txtIntro" rows="5" class="textbox" value="{{ old('txtIntro') }}"></textarea>
			</span><br />
			<span class="form_label">Nội dung tin:</span>
			<span class="form_item">
				<textarea name="txtFull" rows="8" class="textbox">{{ old('txtFull') }}</textarea>
			</span><br />
			<span class="form_label">Hình đại diện:</span>
			<span class="form_item">
				<input type="file" name="newsImg" class="textbox" />
			</span><br />
			<span class="form_label">Công bố tin:</span>
			<span class="form_item">
				<input type="radio" name="rdoPublic" value="1" {{ (old('rdoPublic') == 1) ? "checked" : "" }} /> Có 
				<input type="radio" name="rdoPublic" value="0" {{ (old('rdoPublic') == 0) ? "checked" : "" }} /> Không
			</span><br />
			<span class="form_label"></span>
			<span class="form_item">
				<input type="submit" name="btnNewsAdd" value="Thêm tin" class="button" />
			</span>
		</fieldset>
	</form>
</div>
@endsection