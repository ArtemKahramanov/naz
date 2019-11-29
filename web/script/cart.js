$('.ad-cart').on('click', function(event) {
    var quantity = $(this).parent().find(".input--count").val();
    var product_id = $(this).attr('data-href');

    $.ajax({
        url: '/cart/add?'+'id='+product_id+'&qty='+quantity,
        cache: false,
        contentType: false,
        processData: false,
        type: 'get',
        success: function(php_script_response){
            var response = JSON.parse(php_script_response);
            $('.bd-example-modal-sm').modal('show');
            $('.cart-quantity').html(response.quantity);
        },
        error: function(php_script_response){
            alert(php_script_response);
        },
    });
});
