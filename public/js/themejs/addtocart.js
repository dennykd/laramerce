/* -------------------------------------------------------------------------------- /

	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.

/ -------------------------------------------------------------------------------- */

// Cart add remove functions
var cart = {
    add: function (product_code, user_id, amount = false) {
        let product = getProductData(product_code);
        if (user_id == 0) {
            addProductNotice(
                "Login First to Add Product to Cart",
                `<img src="/image/brand.jpg" alt="brand">`,
                `<h3>You Can't Add To Cart</h3>`,
                "success"
            );
        } else {
            addProductNotice(
                "Product added to Cart",
                `<img src="/image/brand.jpg" alt="brand" alt="">`,
                `<h3><a href="#">${product.name}</a> added to <a href="#">shopping cart</a>!</h3>`,
                "success"
            );
            $.ajax({
                url: "/api/add-to-cart",
                type: "POST",
                data: {
                    user_id: user_id,
                    product_id: product_code,
                    amount:
                        amount == false
                            ? $("#product_amount_to_order").val()
                            : 1,
                },
                success: (result) => {
                    $("#cart-no-product").remove();
                    for (let index = 0; index < this.items().length; index++) {
                        const element = this.items()[index];
                        if (element.dataset.product_code == product_code) {
                            element.remove();
                            // element.childNodes[5].innerHTML = $(
                            //     "#product_amount_to_order"
                            // ).val();
                        }
                    }
                    $("#cart-body-to-identify").append(result.view);
                    $("#cart-total-items").html(
                        $("#cart-body-to-identify").children().length
                    );
                },
            });
        }
    },
    remove: (product_code, user_id) => {
        $.ajax({
            url: "/api/remove-product-cart",
            type: "POST",
            data: {
                user_id: user_id,
                product_id: product_code,
            },
            success: (result) => {
                for (let index = 0; index < cart.items().length; index++) {
                    const element = cart.items()[index];
                    if (element.dataset.product_code == product_code) {
                        element.remove();
                    }
                }
                $("#cart-total-items").html(
                    $("#cart-body-to-identify").children().length
                );
            },
        });
    },
    items: () => {
        return $("#cart-body-to-identify").children();
    },
};

var wishlist = {
    add: function (product_code, user_id) {
        let product = getProductData(product_code);
        if (user_id == 0) {
            addProductNotice(
                "Login First to Add Product to WishList",
                `<img src="/image/brand.jpg" alt="brand" alt="">`,
                `<h3>You Can't Add To WishList</h3>`,
                "success"
            );
        } else {
            addProductNotice(
                "Product added to WishList",
                `<img src="/image/brand.jpg" alt="brand" alt="">`,
                `<h3><a href="#">${product.name}</a> added to <a href="#">shopping WishList</a>!</h3>`,
                "success"
            );

            $.ajax({
                url: "/api/add-to-wishlist",
                type: "POST",
                data: {
                    user_id: user_id,
                    product_id: product_code,
                },
                success: (result) => {
                    $("#wishlist-count").prop("title");
                },
            });
        }
    },
    remove: (product_code, user_id) => {
        $.ajax({
            url: "/api/remove-product-wishlist",
            type: "POST",
            data: {
                user_id: user_id,
                product_id: product_code,
            },
            success: (result) => {
                for (let index = 0; index < wishlist.items().length; index++) {
                    const element = wishlist.items()[index];
                    if (element.dataset.product_code == product_code) {
                        element.remove();
                    }
                }
            },
        });
    },
    update_qty: () => {},
    items: () => {
        return $("#wishlist-body-to-identify").children();
    },
};
var compare = {
    add: function (product_id) {
        addProductNotice(
            "Product added to compare",
            '<img src="/image/demo/shop/product/e11.jpg" alt="">',
            '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>',
            "success"
        );
    },
};

function getProductData(product_code) {
    let ajaxProduct = $.ajax({
        url: "/api/get-product/" + product_code,
        method: "GET",
        async: false,
    });
    return ajaxProduct.responseJSON;
}

/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
function addProductNotice(title, thumb, text, type) {
    "use strict";
    $.jGrowl.defaults.closer = false;
    //Stop jGrowl
    //$.jGrowl.defaults.sticky = true;
    var tpl = thumb + "<h3>" + text + "</h3>";
    $.jGrowl(tpl, {
        life: 4000,
        header: title,
        speed: "slow",
        theme: type,
    });
}
