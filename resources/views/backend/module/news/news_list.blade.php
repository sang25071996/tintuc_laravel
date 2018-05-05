@extends('backend.master')
@section('title','Trang news list')
@section('content')

<div id="main">
	<table class="list_table">
		<tr class="list_heading">
			<td class="id_col">STT</td>
			<td>Tiêu Đề</td>
			<td>Tác Giả</td>
			<td>Thời Gian</td>
			<td class="action_col">Quản lý?</td>
		</tr>

        @foreach($data as $item)
		<tr class="list_data">
            <td class="aligncenter">{{ $loop->iteration }}</td>
            <td class="list_td aligncenter">{{ $item['title'] }}</td>
            <td class="list_td aligncenter">{{ $item['author'] }}</td>
			<td class="list_td aligncenter">{{ date( "m/d/Y", strtotime($item['created_at'])) }}</td>
            <td class="list_td aligncenter">
                <a href="{{ route('admin.news.edit',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/edit.png') }}" /></a>&nbsp;&nbsp;&nbsp;
                <a onclick="return delete_message()" href="{{ route('admin.news.destroy',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/delete.png') }}" /></a>
            </td>
        </tr>
        @endforeach
	</table>
</div>
@endsection