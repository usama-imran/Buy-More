$(function(){
	
	$("button").bind("click", AddToCart);
	
	$(".input_fields").on('click',function(){
		
		
		// getting the details of the selected products
		var pro_id = $(this).attr('data-value');
		var pro_name = $('#pro_name'+pro_id+'').text();
		var pro_price = $('#pro_price'+pro_id+'').text();
		var pro_description = $('#pro_description'+pro_id+'').text();
		
		
		// this function gets the total sum of the product price w.r.t quantity
		$('#quantity'+pro_id+'').blur(function(){ 
			var pro_quantity = $('#quantity'+pro_id+'').val();
			var total = pro_price*pro_quantity;
			$('#total'+pro_id+'').text(total);
		});	
	});
	
	
	// To make the items draggable
	$( ".thumbnail" ).draggable
	 ({ 
	  containment: 'document',
	  opacity: 0.9,
	  revert: 'invalid',
	  helper: 'clone',
	  zIndex: 500
	 });
	
	// To make the dragged items droppable in the cart
	$("#cart_div").droppable({
		  drop:function(e, ui)
		  {
		   var param = $(ui.draggable).attr('data-value');
		   console.log("Yow");
		   DropToCart(param);
		  }
		 });
	
	
	
	// adding the dropped item in the cart
	function DropToCart (id){
		
		var pro_id = id;
		var pro_quantity =1;
		var pro_name = $('#pro_name'+pro_id+'').text();
		var pro_price = $('#pro_price'+pro_id+'').text();
		var pro_price_total = pro_price*pro_quantity;
		$.post("../../../Controller/cart_controller/Cart_Controller/myArray",
		        {
				product_id: pro_id,
				product_name:pro_name,
				product_price: pro_price,
				product_quantity: pro_quantity,
				product_total:pro_price_total
		        },
		        function(msg){
		        	$('#cart_div').empty().load('../../../Controller/index_controller/Index_Controller/index'+' #cart_div');
		        });
			
	}
	
	
	// Method to add products to the cart on button click
	function AddToCart (){
			
			var pro_id = $(this).attr('data-value');
			
			var pro_name = $('#pro_name'+pro_id+'').text();
			var pro_price = $('#pro_price'+pro_id+'').text();
			var pro_price_total = $('#total'+pro_id+'').text();

			var pro_quantity =$('#quantity'+pro_id+'').val();
			if(pro_quantity == "" || pro_quantity < 1)
				{
					 pro_quantity = 1;
					 pro_price_total = pro_price * pro_quantity;
				}
			
			$.post("../../../Controller/cart_controller/Cart_Controller/myArray",
			        {
					product_id: pro_id,
					product_name:pro_name,
					product_price: pro_price,
					product_quantity: pro_quantity,
					product_total:pro_price_total
			        },
			        function(msg){
			        	console.log(msg);
			        	$('#cart_div').empty().load(' #cart_div');
			        	
			        });
				
		}
	
	
	
	
});
