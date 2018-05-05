$(document).ready(function(){
	$(".theloai").click(function(){
		var id = $(this).children().attr('id');
		getdata(id);
	});
});
function getdata(id){
	$.ajax({
		type: "GET",
		url: "http://localhost:8080/sang/framework/baitap/hoc-ajax/ajax-the-loai/" + id,
		dataType: "html",
		success:function(kq){
			$("#noidung").html(kq);
		}
	})
}