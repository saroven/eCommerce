

function nav_highlight(father_id, mother_id, child_id){
	$(".nav").removeClass('active');
	$("#"+father_id).addClass('menu-open')
	$("#"+mother_id).addClass('active');
	$("#"+child_id).addClass('active');
}
