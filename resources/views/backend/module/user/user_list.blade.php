@extends('backend.master')
@section('title','Trang User List')
@section('content')
<div id="main">
	<table class="list_table">
		<tr class="list_heading">
			<td class="id_col">STT</td>
			<td>Username</td>
			<td>Level</td>
			<td class="action_col">Quản lý?</td>
		</tr>
       {{--  {{ dd($data) }} --}}
        @foreach($data as $item)
		<tr class="list_data">
            <td class="aligncenter">{{ $loop->iteration }}</td>
            <td class="list_td aligncenter">{{ $item['email'] }}</td>
            <td class="list_td aligncenter">
                @if($item["id"] == 1 && $item['level'] == 1)
                    <span style="color: red; font-weight: bold;">
                        SuperAdmin
                    </span></td>
                @elseif($item['level'] == 1)
                    <span style="color: Blue; font-weight: bold;">
                        Admin
                    </span></td>
                @else
                    <span style="color: Black; font-weight: bold;">
                        Member
                    </span></td>
                @endif
            <td class="list_td aligncenter">
                <a href="{{ route('admin.user.edit',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/edit.png') }}" /></a>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('admin.user.destroy',['id' => $item['id']]) }}"><img src="{{ asset('public/backend/images/delete.png') }}" /></a>
            </td>
        </tr>
        @endforeach
	</table>
</div>
@endsection