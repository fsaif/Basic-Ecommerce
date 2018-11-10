var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};

var liveName = function (event) {
    var InputUser = document.getElementById('InputUser'),
        OutputUser = document.getElementById('OutputUser');
    OutputUser.textContent = InputUser.value;
};

var liveDescription = function (event) {
    var description = document.getElementById('description'),
        OutputDescripe = document.getElementById('OutputDescripe');
    OutputDescripe.textContent = description.value;
};

var increasePrice = function (event) {
    var quantity = document.getElementById('quantity');
    quantity.value++;
};

var decreasePrice = function (event) {
    var quantity = document.getElementById('quantity');
    if (quantity.value > 0) {
        quantity.value--;
    }
};

$(document).ready(function () {

    var quantity = 1;
    $('.quantity-plus').click(function (e) {
        e.preventDefault();
        var quantity = parseInt($(this).next('#quantity').val());
        $(this).next('#quantity').val(quantity + 1);
        $(this).next().next('#hiddenQuantity').val(quantity + 1);

        $.ajax({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: '/en/shop/cart',
            method: "POST",
            data: {
                quantity: 1,
            },
            dataType: "text",
            success: function (data) {
                console.log('success');
            }
        });

    });

    $('.quantity-minus').click(function (e) {
        e.preventDefault();
        var quantity = parseInt($(this).prev().prev('#quantity').val());

        if (quantity > 1) {
            $(this).prev().prev('#quantity').val(quantity - 1);
            $(this).prev('#hiddenQuantity').val(quantity - 1);

            $.ajax({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                url: '/en/shop/cart',
                method: "POST",
                data: {
                    quantity: -1,
                },
                dataType: "text",
                success: function (data) {
                    console.log(product);
                }
            });
        }
    });

});



