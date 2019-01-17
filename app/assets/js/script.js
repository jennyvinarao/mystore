//$(document).ready( ()=> {
// 	function validate_registration_form() {
// 	let errors = 0;
// 		let username = $("#username").val();
// 		let password = $("#password").val();
// 		let firstname = $("#firstname").val();
// 		let lastname = $("#lastname").val();
// 		let email = $("#email").val();
// 		let address = $("#address").val();


// 		//username should be greater than or equal to 10 chars
// 		if(username.length < 10) {
// 			$("#username").next().html("Username should be at least 10 characters");
// 			errors++;
// 		} else {
// 			$('#username').next().html(' ');
// 		}

// 		//password should be atleast 8 characters
// 		if(password.length < 8) {
// 			$("#password").next().html("Please provide a stronger password");
// 			errors++;
// 		} else {
// 			$("#password").next().html(' ');
// 		}

// 		//email should include the @ symbol
// 		if(!email.includes("@")) {
// 			$("#email").next().html("Please provide a valid email");
// 			errors++;
// 		} else {
// 			$("#email").next().html(' ');
// 		}

// 		//address
// 		if(!address != "") {
// 			$("#address").next().html("Please provide a valid address");
// 			errors++;
// 		} else {
// 			$("#address").next().html('');
// 		}

// 		// firstname
// 		if(!firstname != "") {
// 			$("#firstname").next().html("Please provide a valid first name");
// 			errors++;
// 		} else {
// 			$("#firstname").next().html(' ');
// 		}

// 		// lastname
// 		if(!lastname != "") {
// 			$("#lastname").next().html("Please provide a valid last name");
// 			errors++;
// 		} else {
// 			$("#lastname").next().html(' ');
// 		}

// 		//confirm password
// 		if(password !== $("#confirm_password").val()) {
// 			$("#confirm_password").next().html("Passwords should match");
// 			errors++;
// 		} else {
// 			$("#confirm_password").next().html(' ');
// 		}

// 		if(errors > 0) {
// 			return false; //this means there are errors
// 		} else {
// 			return true;
// 		}

// 	}











// 	$("#add_user").click( (e) => {
// 		if(validate_registration_form()) {
// 			let username = $("#username").val();
// 			let password = $("#password").val();
// 			let firstname = $("#firstname").val();
// 			let lastname = $("#lastname").val();
// 			let email = $("#email").val();
// 			let address = $("#address").val();

// 			$.ajax({
// 				"url" : '../controllers/create_user.php',
// 				"method" : "POST",
// 				"data" : {
// 					'username' :username,
// 					'password' :password,
// 					'firstname' :firstname,
// 					'lastname' :lastname,
// 					'email' :email,
// 					'address' :address
// 				},
// 				"success":(data) => {
// 					if(data == "user_exists") {
// 						$("#username").next().html("Username already exists");
// 					} else {
// 						alert("user created successfully");
// 						//redirect broswer
// 						window.location.replace("../../index.php")
// 					}
// 				}
// 			});
// 		}

// 	});

	//prep for add to cart

	$(document).on('click', '.add-to-cart', (e) => {
		//to prevent default behavior and to override it with our own 
		e.preventDefault();
		//prevent parent_elements to be triggered
		e.stopPropagation();

		//target is the one who triggered event
		let item_id = $(e.target).attr("data-id");
		let item_quantity = parseInt($(e.target).prev().val());

		$.ajax({
			"url" : "../controllers/update_cart.php",
			"method" : "POST",
			"data" : {
				'item_id':item_id,
				'item_quantity': item_quantity,
				'update_from_cart_page' : 0
			},
			"success" : (data)=> {
				$("#cart-count").html(data);
			}
		});
	});

		function getTotal() {
			let total = 0;
			$(".item_subtotal").each(function(e) {
				total += parseFloat($(this).html());
			})
			$('#total_price').html(total.toFixed(2));

		}

		//edit cart
		$(".item_quantity>input").on("input", (e) => {	
			let item_id = $(e.target).attr('data-id');
			let quantity = parseInt($(e.target).val());
			let price = parseFloat($(e.target).parents('tr').find(".item_price").html());

			subTotal = quantity * price;
			if (quantity < 0) {
				quantity = "0";
				alert('Invalid Quantity!');
			} else {
				$(e.target).parents('tr').find('.item_subtotal').html(subTotal.toFixed(2));
				getTotal();

			}

			$.ajax({
				"method":"POST",
				"url": "../controllers/update_cart.php",
				"data": {
					'item_id' : item_id,
					'item_quantity' : quantity,
					'update_from_cart_page': 1
				},
				"success" : (data) => {
					$('#cart-count').html(data);
				}	

			});
		});
		//delete button

		$(document).on("click",".item_remove",(e) =>{
			e.preventDefault();
			e.stopPropagation();

			let item_id = $(e.target).attr('data-id');

			$.ajax({
				"method": "POST",
				"url": "../controllers/update_cart.php",
				"data": {
					'item_id': item_id,
					'item_quantity': 0
				},
				"success" : (data) => {
					var msg;
					var r = confirm('Remove from the cart?');
					if (r == true) {
						$(e.target).parents('tr').remove();
						$('#cart-count').html(data);
						getTotal();
						window.location.replace('../views/cart.php');
					}
				}

			})

		});

		//update user details
		$(document).on('click', '#update_info', ()=> {
			// alert("update");
		let errorFlag = true;
		//firstname & lastname field is empty
		const firstname = $('#firstname').val();
		const lastname = $('#lastname').val();
		const email = $('#email').val();
		const address = $('#address').val();

		

			if (firstname == 0) {
				$('#firstname').next().css('color','red');
				$('#firstname').next().html('This field is required');
				errorFlag = false;
			}
			else if (lastname == 0) {
				$('#lastname').next().css('color','red');
				$('#lastname').next().html('This field is required');
				errorFlag = false;
			}
			else if (!email.includes("@")) {
				$('#email').next().css('color','red');
				$('#email').next().html('Valid email required');
				errorFlag = false;
			}

			else if (address == 0) {
				$('#address').next().css('color','red');
				$('#address').next().html('This field is required');
				errorFlag = false;
			}
			else {
			$('#username').next().html('UPDATE SUCCESSFULLY SAVED!');
			$('#update_user_details').submit();
			window.location.replace('../views/profile.php?section=prof');

		}

		});
		







