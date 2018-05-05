@extends('backend.master')
@section('title','Trang category list')
@section('content')
<div id="main">
	<table class="list_table">
		<tr class="list_heading">
			<td class="id_col">STT</td>
			<td>Danh Mục</td>
			<td>Tạo bởi</td>
			<td class="action_col">Quản lý?</td>
		</tr>
        @foreach($data as $item)
		<tr class="list_data">
            <td class="aligncenter">{{ $loop->iteration}}</td>
			<td class="list_td alignleft">{{ $item['name'] }}</td>
			<td class="aligncenter">
{{-- 			@php
					$user = DB::table('users')->where('id',$item['user_id'])->first();
					
			@endphp
					{{ $user->email }} --}}
				{{ $item['users']['email'] }}
			</td>
            <td class="list_td aligncenter">
                <a href="{{ route('admin.category.edit',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/edit.png') }}" /></a>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('admin.category.destroy',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/delete.png') }}" /></a>
            </td>
        </tr>
	   @endforeach
	</table>
</div>
@endsection