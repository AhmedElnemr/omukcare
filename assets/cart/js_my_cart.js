$(document).ready(function () {
	console.log("nain");
	displayCart();
	displayCartRow();
	inputs();
	$(".total-cart").html(shoppingCart.totalCart());
	$(".total-cart-count").html(shoppingCart.countCart());
});

//===========================================================
function isMyCode() {
	$(".add-to-cart").on("click", function () {
		console.log("one");
		var oneObj = $(this);
		var id = Number(oneObj.attr("data-id"));
		var name = oneObj.attr("data-name");
		var price = Number(oneObj.attr("data-price"));
		var img = oneObj.attr("data-img");
		var product_id = oneObj.attr("data-product-id");
		var offer_type = oneObj.attr("data-offer-type");
		var offer_value = oneObj.attr("data-offer-value");
		var old_price = oneObj.attr("data-old-price");
		var partner_id = oneObj.attr("data-partner-id");
		var currency = oneObj.attr("data-currency") || "-";
		var have_offer = oneObj.attr("data-have-offer") ;
		var count = 1;
		shoppingCart.addItemToCart(name, price, count, id, img, product_id,
			offer_type, offer_value, old_price, partner_id ,currency ,have_offer);
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
		// displayCart();
		swal(msg, "", "success");

	});
}


//===========================================================
function displayCart() {
	//  console.log("cart");
	var cartArray = shoppingCart.listCart();
	// console.log(cartArray);
	if (cartArray.length > 0) {
		var output = "";
		var countRow = 1;
		for (var i in cartArray) {
			//==========================
			var name = cartArray[i].name;
			var price = cartArray[i].price;
			var count = cartArray[i].count;
			var idItem = cartArray[i].id;
			var img = cartArray[i].img;
			var product_id = cartArray[i].product_id;
			var offer_type = cartArray[i].offer_type;
			var offer_value = cartArray[i].offer_value;
			var old_price = cartArray[i].old_price;
			var partner_id = cartArray[i].partner_id;
			var currency = cartArray[i].currency;
			var total = price * count;
			output += '<tr>' +
				'<td><img src="' + img + '" alt="cart" class=" " height="100" width="100">' + '</td>' +
				'<td> <a href="#">' + name + '</a>' +
				'<div class="mobile-cart-content row">' +
				'<div class="col-xs-3">' +
				'<div class="qty-box">' +
				'<div class="input-group">' +
				'<input type="text" name="quantity" class="form-control input-number" value="' + count + '">' +
				'</div>' +
				'</div>' +
				'</div>' +
				'<div class="col-xs-3">' +
				'<h2 class="td-color">' + currency + '' + price + ' </h2>' +
				'</div>' +
				'<div class="col-xs-3">' +
				'<h2 class="td-color">' +
				'<a class="icon subtract-item" data-id="' + idItem + '">' +
				'<i class="far fa-times-circle "></i>' +
				'</a>' +
				'</h2>' +
				'</div>' +
				'</div>' +
				'</td>' +
				'<td> <h4>' + price + '  ' + currency + ' </h4> </td>' +
				'<td>' +
				'<div class="qty-box">' +
				'<div class="input-group">' +
				'<input type="text" name="quantity" class="form-control input-number " readonly="" value="' + count + '">' +
				'</div>' +
				'</div>' +
				'</td>' +
				'<td> <h4 class="td-color">' + total + '  ' + currency + ' </h4></td>' +
				'<td>' +
				'<a class="icon subtract-item" data-id="' + idItem + '">' +
				'<i class="far fa-times-circle "></i>' +
				'</a>' +
				'</td>' +
				'</tr>';
			countRow++;
		}
		$("#show-cart").html(output);
	} else {
		var output = '<tr>' + '<td colspan="6">السله فارغه </td>' + '</tr>';
		$("#show-cart").html(output);
	}
	$(".total-cart-count").html(shoppingCart.countCart());

	/*
	$("#total-invoice").html(shoppingCart.totalCartDis());
	$("#in-total-cart").val(shoppingCart.totalCartDis());
	$("#total_table_tax").val(shoppingCart.totalCartTax());
	*/
}

//===========================================================
function displayCartRow() {
	//  console.log("cart");
	var cartArray = shoppingCart.listCart();
	// console.log(cartArray);
	if (cartArray.length > 0) {
		var output = "";
		var countRow = 1;
		for (var i in cartArray) {
			//==========================
			var name = cartArray[i].name;
			var price = cartArray[i].price;
			var count = cartArray[i].count;
			var idItem = cartArray[i].id;
			var img = cartArray[i].img;
			var product_id = cartArray[i].product_id;
			var offer_type = cartArray[i].offer_type;
			var offer_value = cartArray[i].offer_value;
			var old_price = cartArray[i].old_price;
			var partner_id = cartArray[i].partner_id;
			var currency = cartArray[i].currency;
			var total = price * count;
			output += '<li>'+name+' × '+count+' <span>'+total+' '+currency+'</span> </li>';
			countRow++;
		}
		$("#show-cart-row").html(output);
	} else {
		var output = '<tr>' + '<td colspan="3">السله فارغه </td>' + '</tr>';
		$("#show-cart-row").html(output);
	}
}

//===========================================================
function inputs() {
	var cartArray = shoppingCart.listCart();
	// console.log(cartArray);
	if (cartArray.length > 0) {
		var output = "";
		var countRow = 1;
		for (var i in cartArray) {
			//==========================
			var name = cartArray[i].name;
			var price = cartArray[i].price;
			var count = cartArray[i].count;
			var idItem = cartArray[i].id;
			var img = cartArray[i].img;
			var product_id = cartArray[i].product_id;
			var offer_type = cartArray[i].offer_type;
			var offer_value = cartArray[i].offer_value;
			var old_price = cartArray[i].old_price;
			var partner_id = cartArray[i].partner_id;
			var have_offer = cartArray[i].have_offer;
			var total = price * count;
			output += '<input type="hidden" name="product_id[]" value="' + product_id + '">';
			output += '<input type="hidden" name="amount[]" value="' + count + '">';
			output += '<input type="hidden" name="cost[]" value="' + total + '">';
			output += '<input type="hidden" name="offer_type[]" value="' + offer_type + '">';
			output += '<input type="hidden" name="offer_value[]" value="' + offer_value + '">';
			output += '<input type="hidden" name="old_price[]" value="' + old_price + '">';
			output += '<input type="hidden" name="have_offer[]" value="' + have_offer + '">';
			output += '<input type="hidden" name="partner_id[]" value="' + partner_id + '">';
		}
		output += '<input type="hidden" name="total_cost" value="' + shoppingCart.totalCart() + '">';
		$("#cart-cart-input").html(output);
	}
}


//===========================================================
$(function () {

	/*$('.your-cart').each(function () {
		console.log("int");

		//  displayCart();
	});*/
	//------------------------------------------------------
	console.log("int");
	isMyCode()
	//------------------------------------------------------
	//------------------------------------------------------
	$("#show-cart").on("click", ".delete-item", function (event) {
		// console.log("delete")
		var Id = $(this).attr("data-id");
		shoppingCart.removeItemFromCartAll(Id);
		displayCart();
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
	});
	//------------------------------------------------------
	$("#show-cart").on("click", ".subtract-item", function (event) {
		var Id = $(this).attr("data-id");
		shoppingCart.removeItemFromCart(Id);
		displayCart();
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
	});
	//------------------------------------------------------
	$("#show-cart").on("change", ".item-count", function (event) {
		var Id = $(this).attr("data-id");
		var count = Number($(this).val());
		shoppingCart.setCountForItem(Id, count);
		displayCart();
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
	});
	//------------------------------------------------------
	$("#show-cart").on("click", ".plus-item", function (event) {
		//
		var Id = $(this).attr("data-id");
		// console.log("Id = " + Id)
		shoppingCart.plusItemToCart(Id, 1);
		displayCart();
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
	});
	//------------------------------------------------------
	$("#discount").on("click keyup", function () {
		$("#total-invoice").html(shoppingCart.totalCartDis());
		$("#in-total-cart").val(shoppingCart.totalCartDis());
	});
	//------------------------------------------------------
	$(".cal-paid").on("keyup", function () {
		// console.log($("[data-type='paid']").val());
		var cost = parseFloat($("[data-type='cost']").val()) || 0;
		var paid = parseFloat($("[data-type='paid']").val()) || 0;
		var remain = paid - cost;
		remain = remain.toFixed(2);
		$("[data-type='remain']").val(remain);
	});
	//------------------------------------------------------
	$(".cal-comm").on("click", function () {
		//console.log($(this).attr("db-per"));
		$("#commission_per").val($(this).attr("db-per"));
		$("#to_acc_code").val($(this).attr("db-acc"));
		$("#commission_code").val($(this).attr("db-com"));
	});
	//------------------------------------------------------
	$("#clear-cart").on("click", function () {
		shoppingCart.clearCart();
		displayCart();
		$(".total-cart").html(shoppingCart.totalCart());
		$(".total-cart-count").html(shoppingCart.countCart());
	});
	//------------------------------------------------------


});
