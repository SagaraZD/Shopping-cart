//Type Edit toggle input
$(".etype").click(function(){
  $(this).parents('tr').find('.edit-type-form').toggle();
  $(this).parents('tr').find('.tname').toggle();
});

//Add to Cart
function addToCart(productid) {
  $.ajax({
    method: 'POST',
    url: urlCart,
    data: {product_id: productid, _token: token}

  }).done(function (data){
    var count = data;
    $("#carItemCount").text(count);
  });

}

// Products Type Change
  $("#cselect").change(function(){
    var Type = $("#cselect").val();
    window.location.assign("http://"+hostURL+"/get-type-products/type="+Type);
  });
