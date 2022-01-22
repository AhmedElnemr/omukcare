// ***************************************************
// Shopping Cart functions

var shoppingCart = (function () {
    // Private methods and properties
    var cart = [];

    function Item(name, price, count ,id,img , product_id , offer_type ,
				  offer_value , old_price ,partner_id ,currency ,have_offer) {
        this.name = name
        this.price = price
        this.count = count
        this.id = id
        this.img = img
        this.offer_type = offer_type
        this.offer_value = offer_value
        this.old_price = old_price
        this.partner_id = partner_id
        this.product_id = product_id
        this.currency = currency
        this.have_offer = have_offer
     //    this.priceBeforeTax = this.price - this.tax
    }

    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = []
        }
    }

    loadCart();


    // Public methods and properties
    var obj = {};

    obj.addItemToCart = function (name, price, count ,id,img , product_id ,
								  offer_type ,offer_value , old_price ,partner_id ,currency ,have_offer) {
        for (var i in cart) {
            if (cart[i].id == id) {
                cart[i].count += count;
                saveCart();
                return;
            }
        }

        //    console.log("addItemToCart:", name, price, count);

        var item = new Item(name, price, count ,id,img , product_id ,
			                offer_type ,offer_value , old_price ,partner_id ,currency ,have_offer);
        cart.push(item);
        saveCart();
    };

    obj.setCountForItem = function (id, count) {
        for (var i in cart) {
            if (cart[i].id == id) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCart = function (id) { // Removes one item
        for (var i in cart) {
            if (cart[i].id == id) { // "3" === 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCartAll = function (id) { // removes all item name
        for (var i in cart) {
            if (cart[i].id == id) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };

    obj.plusItemToCart = function (id ,count){
       // console.log("plusItemToCart " )
        for (var i in cart) {
           // console.log("cart[i].id = " + cart[i].id + " -- id = " + id)
            if (cart[i].id == id) {
                cart[i].count += count;
                saveCart();
                return;
            }
        }
    };

    obj.clearCart = function () {
        cart = [];
        saveCart();
    }


    obj.countCart = function () { // -> return total count
        var totalCount = 0;
        for (var i in cart) {
            totalCount += cart[i].count;
        }

        return totalCount;
    };

    obj.totalCart = function () { // -> return total cost
        var totalCost = 0;
        for (var i in cart) {
            totalCost += cart[i].price * cart[i].count;
        }
        return totalCost.toFixed(2);
    };

    obj.totalCartTax = function () { // -> return total cost
        var totalCostTax = 0;
        for (var i in cart) {
            totalCostTax += cart[i].tax * cart[i].count;
        }
        return totalCostTax.toFixed(2);
    };

    obj.listCart = function () { // -> array of Items
        var cartCopy = [];
        //   console.log("Listing cart");
        //    console.log(cart);
        for (var i in cart) {
            //   console.log(i);
            var item = cart[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            itemCopy.total = (item.price * item.count).toFixed(2);
          //  itemCopy.totalPrices = (item.priceBeforeTax * item.count).toFixed(2);
          //  itemCopy.totalTax = itemCopy.total - itemCopy.totalPrices;
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };

    // ----------------------------
    return obj;
})();




