// jquery to edit the categories on the category_index page
$(function(){
		$("a").bind("click", Edit);
		function Edit(){ 
		// identifying the fields to be edited w.r.t thir <td>
		var par = $(this).parent().parent();	
		var tdID = par.children("td:nth-child(1)");
		var tdName = par.children("td:nth-child(2)"); 
		var tdDescription = par.children("td:nth-child(3)"); 
		//var tdDate = par.children("td:nth-child(4)"); 
		var tdButtons = par.children("td:nth-child(6)"); 
		// changing the row to editable form
		tdID.html("<input type='text' disabled id='txtID' value='"+tdID.html()+"'/>"); 
		tdName.html("<input type='text' id='txtName' class='input_fields' value='"+tdName.html()+"'/>"); 
		tdDescription.html("<input type='text' id='txtDescription' class='input_fields' value='"+tdDescription.html()+"'/>"); 
		//tdDate.html("<input type='text' id='txtDate' class='input_fields' value='"+tdDate.html()+"'/>"); 
		tdButtons.html('<button id="save" class="btn btn-success">Save</button>'); 
		//binding the save button click to save function
		$("#save").bind("click", Save);
		console.log("Edit Button Clicked!");
		}
	// Save changes implementation after edit
	function Save()
	{
		//identifying the fields
		var par = $(this).parent().parent();	
		var tdID = par.children("td:nth-child(1)");
		var tdName = par.children("td:nth-child(2)"); 
		var tdDescription = par.children("td:nth-child(3)"); 
		//var tdDate = par.children("td:nth-child(4)"); 
		var tdButtons = par.children("td:nth-child(6)"); 
		//getting the value from the form
		console.log("Save Button Clicked");
		var id = $("#txtID").val();
		var name = $("#txtName").val();
		var description = $("#txtDescription").val();
		//var date = $("#txtDate").val();
		// creating a data string to store the data from the edit input fields
		var dataString ='cat_id='+ id + '&cat_name='+ name + '&cat_description='+ description ;
		// posting the data string to the categories contoller which will post the data to database
		$.post("../../../Controller/categories_controller/Categories/edit_categories",
		        {
				cat_id: id,
				cat_name: name,
				cat_description: description
				
		        },
		        function(data){
		           console.log(data);
		        });
		// returning the view back to its normal form
		tdID.html(tdID.children("input[type=text]").val());
		tdName.html(tdName.children("input[type=text]").val());	
		tdDescription.html(tdDescription.children("input[type=text]").val());
		//tdDate.html(tdDate.children("input[type=text]").val());
		tdButtons.html('<a class="hvr-pop"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>');
		$("a").bind("click", Edit);
	}
	
});