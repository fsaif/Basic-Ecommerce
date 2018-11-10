var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};

var liveName = function(event) {
    var InputUser = document.getElementById('InputUser'),
        OutputUser = document.getElementById('OutputUser');
    OutputUser.textContent = InputUser.value;
};

var liveDescription = function(event) {
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

