
$(document).ready(function(){
	
	// initializing the form fields
	var form = $("#pro_form");
	
	var name = $("#name");
	name.attr('maxlength','100');
	
	var price = $("#price");
	price.attr('min','0');
	
	var quantity = $("#quantity");
	quantity.attr('maxlength','100')
	quantity.attr('min','0')
	
	var description = $("#description");
	description.attr('maxlength','255')
	
	
	var name_detail = $("#name_detail");
	name_detail.text("Enter Name");
	name_detail.css("font-size", "13");
	name_detail.css("padding-top", "10px");
	
	
	var price_detail = $("#price_detail");
	price_detail.text("Enter Price");
	price_detail.css("font-size", "13");
	price_detail.css("padding-top", "10px");
	
	
	var description_detail = $("#description_detail");
	description_detail.text("Enter Discription i.e 'Lorem Ipsum' ");
	description_detail.css("font-size", "13");
	description_detail.css("padding-top", "10px");
	
	var quantity_detail = $("#quantity_detail");
	quantity_detail.text("Enter Quantity");
	quantity_detail.css("font-size","13");
	quantity_detail.css("padding-top","10px");

	
	
	//Calling the function implementation on keypress
	name.keyup(validate_name);
	price.keyup(validate_price);
	description.keypress(validate_description);
	quantity.blur(validate_quantity);
	
	
	
	// Form submit chek if the required fields are returning true or not
	
	form.submit(function()
			{
		if(validate_name() & validate_description() & validate_price() & validate_quantity())
			{
			return true;	
			}
		else
			{
			return false;
			}
			});
	
	//Name Validation
	function validate_name() 
	{
		
		if(name.val().length < 3)
			{
			name_detail.text(" * Name must be atleast 3 charachters long!");
			name_detail.css("color", "red");
			
			return false;
			}
		else
			{
			name_detail.css("color", "green");
			name_detail.html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>");
			return true;
			}
		
	}
	
	// price validation
	function validate_price()
	{
		if(price.val() < 1)
			{
			price_detail.text(" * It cannot be that cheap");
			price_detail.css("color", "red");
			return false;
			}
		else
			{
			price_detail.css("color", "green");
			price_detail.html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>");
			return true;
			}
		
	}
	
	
	

	//Description Counter 
	function validate_description() 
	{			
			var total = 255;
			var typed = description.val().length;
			var remaining = total - typed;
			description_detail.css("color","green");
			description_detail.text(remaining).append(" characters remaining");
			return true;
				
	}
	
	function validate_quantity() 
	{
		if(quantity.val() <= 0)
			{
			quantity_detail.css("color", "red");	
			quantity_detail.text(" * We are not in debt");
			return false;
			}
		else
			{
			quantity_detail.css("color", "green");
			quantity_detail.html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>");
			return true;
			}
				
	}
	
	
	
	
	
});