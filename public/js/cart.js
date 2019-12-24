$(document).ready(function () {
    msg = new Array();
    var basket = '';
    var totalprice = 0;
    var totalCountGoods = 0;
    if (!$.cookie("basket")) {
        $.cookie("basket", '', {path: "/"});
    }
    basket = decodeURI($.cookie("basket"));
    basketArray = basket.split(",");// Находим все товары
    for (var i = 0; i < basketArray.length - 1; i++) {
        goodsId = basketArray[i].split(":"); // Находим id товара, цену и количество
        totalCountGoods += parseInt(goodsId[1]);
        totalprice += parseInt(goodsId[1]) * parseInt(goodsId[2]);
    }
    if (totalprice > 0) {
        $('#clearBasket').show();
        $('#checkOut').show();
        $('#gugu').show();
        $('.hPb').show();
        $('.hPe').hide();
    }
    if (!totalprice) {
        totalprice = 0;
    }
    $('#totalPrice').text(totalprice);
    $('#totalGoods').text(totalCountGoods);
    $('#gugu').text($.cookie("basket"));
});


$('a.addCart').click(function () {
    data = $(this).attr('id').split('-');
    addCart(data[1], data[2], 1);
    return false;
});


function addCart(p1, p2, p3) {
    if (!p3 || p3 == 0) {
        p3 = 1;
    }
    msg.id = p1; 		  // АйДи
    msg.price = p2; // Цена
    msg.count = parseInt(p3); // Количество
    var check = false;
    var cnt = false;
    var totalCountGoods = 0;
    var totalprice = 0;
    var goodsId = 0;
    var basket = '';
    $('#clearBasket').show();
    $('#checkOut').show();
    $('#gugu').show();
    $('.hPb').show();
    $('.hPe').hide();
    basket = decodeURI($.cookie("basket"));
    if (basket == 'null') {
        basket = '';
    }
    basketArray = basket.split(",");
    for (var i = 0; i < basketArray.length - 1; i++) {
        goodsId = basketArray[i].split(":");
        if (goodsId[0] == msg.id)	// ищем, не покупали ли мы этот товар ранее
        {
            check = true;
            cnt = goodsId[1];
            break;
        }
    }
    if (!check) {
        basket += msg.id + ':' + msg.count + ':' + msg.price + ',';
    } else {
        alert("Уже есть в корзине! Количество товаров можно будет изменить при оформлении заказа");
    }
    if (!check) {
        basketArray = basket.split(",");// Находим все товары
        for (var i = 0; i < basketArray.length - 1; i++) {
            goodsId = basketArray[i].split(":"); // Находим id товара, цену и количество
            totalCountGoods += parseInt(goodsId[1]);
            totalprice += parseInt(goodsId[1]) * parseInt(goodsId[2]);
        }
        $('#totalGoods').text(totalCountGoods);
        $('#totalPrice').text(totalprice);
        $.cookie("totalPrice", totalprice, {path: "/"});
        $.cookie("basket", basket, {path: "/"});
        $('#gugu').text($.cookie("basket"));
    }
}

$('#clearBasket').click(function () {
    $.cookie("totalPrice", '', {path: "/"});
    $.cookie("basket", '', {path: "/"});
    $('#totalPrice').text('0');
    $('#totalGoods').text('0');
    $('#gugu').text('0');
    $('.hPb').hide();
    $('.hPe').show();
    $(this).hide();
    $('#checkOut').hide();
    $.jGrowl("Корзина очищена!");
    return false;
});