$(function(){
	async: false;
	var myid = 4; // getting the category id from the li tag clicked
		// console.log(myid); // uncoment this line to get id in browser console
		$.post("../../../View/product_by_category.php",
		        {
				"catid": myid
		        },
		        function(data){
		        	$('#mydiv').html(data); // passes the responce data to html elemnt with id="mydiv"
		        });

	$("li").on('click' ,function (){
		var myid = $(this).attr('data-value'); // getting the category id from the li tag clicked
		// console.log(myid); // uncoment this line to get id in browser console
		$.post("../../../View/product_by_category.php",
		        {
				"catid": myid
		        },
		        function(data){
		        	$('#mydiv').html(data); // passes the responce data to html elemnt with id="mydiv"
		        });
		});
});