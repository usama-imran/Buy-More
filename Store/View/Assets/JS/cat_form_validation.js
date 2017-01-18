// form validation for adding new category
$(document).ready(function(){
	
	//initializing form input & setting the required attributes
	var form = $("#cat_form");
	
	var name = $("#name");
	name.attr('maxlength','254');
	
	var name_detail = $("#name_detail");
	name_detail.text("Enter Name");
	name_detail.css("font-size", "13");
	name_detail.css("padding-top", "10px");
	
	
	var description = $("#description");
	description.attr('maxlength','255');
	
	var description_detail = $("#description_detail");
	description_detail.text("Enter Discription");
	description_detail.css("font-size", "13");
	description_detail.css("padding-top", "10px");
	
	
	// function calling on keypress
	name.keyup(validate_name);
	description.keypress(validate_description);
	
	//before submitting the form check if the required functions are returning true
	form.submit(function()
			{
		if(validate_name() & validate_description())
			{
			return true;	
			}
		else
			{
			return false;
			}
			});
	
	// validating the name input field
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
	
	
	

	// validating the description input field and count the remaining characters
	function validate_description() 
	{		
			var total = 255;
			var typed = description.val().length;
			var remaining = total - typed;
			description_detail.css("color","green");
			description_detail.text(remaining).append(" characters remaining");
			return true;
				
	}
	
	
	
	
	
});