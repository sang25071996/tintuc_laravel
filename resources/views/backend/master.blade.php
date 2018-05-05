<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{{ asset('public/backend/templates/css/style.css') }}" />
	<title>Admin Area :: @yield('title')</title>
	<script type="text/javascript">
		function delete_message(){
			var ketqua = window.confirm('Bạn có muốn xóa tin này ?');
			// alert(ketqua);
			// return false;
			if(ketqua){
				return true;
			}else{
				return false;
			}
		}
	</script>
</head>
<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a>
				</td>
				<td align="right">
					{{ (Auth::check()) ? Auth::user()->email : "Unknow" }} | <a href="{{ route('getlogout') }}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
	<div id="main">
		@if ($errors->any())
		    <div class="thongbao">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		@yield('content');
	</div>

    <div id="bottom">
        Copyright © 2016 như cc
    </div>
</div>
</body>
</html>