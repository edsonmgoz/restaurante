$(document).ready(function(){
    $('.numeric').on('keyup change', function(event){
        var cantidad = Math.round($(this).val());
        ajaxupdate($(this).attr("data-id"), cantidad);
    });
    
    function ajaxupdate(id, cantidad)
    {
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/itemupdate",
            data: {
                id: id,
                cantidad: cantidad
            },
            dataType: "json",
            success: function(data) {
                if($('#subtotal_' + data.mostrar_pedido.id).html() != data.mostrar_pedido.subtotal)
                {
                    $('#subtotal_' + data.mostrar_pedido.id).html(data.mostrar_pedido.subtotal).animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"});
                }
                
                 $('#total').html(data.mostrar_pedido.total).animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"});
            }
        });
    }
});