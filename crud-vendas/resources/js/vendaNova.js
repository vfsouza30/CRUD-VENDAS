document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[name="produto_id[]"]');
    const quantities = document.querySelectorAll('input[name="produto_quantidade[]"]');

    document.getElementById('valor_total').value = '';
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const productId = checkbox.value;
            const quantityField = document.querySelector(`input[name="produto_quantidade[]"][data-id="${productId}"]`);

            if (checkbox.checked) {
                quantityField.value = 1;
            } else {
                quantityField.value = '';
            }

            calculateTotal();
        });
    });

    quantities.forEach(quantity => {
        quantity.addEventListener('input', calculateTotal);
    });

    function calculateTotal() {
        let total = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const productId = checkbox.value;
                const productPriceField = document.querySelector(`input[name="produto_preco[]"][data-id="${productId}"]`);
                const productPrice = parseFloat(productPriceField.value.replace(/\./g, '').replace(',', '.'));
                const productQuantity = parseInt(document.querySelector(`input[name="produto_quantidade[]"][data-id="${productId}"]`).value) || 0;

                total += productPrice * productQuantity;
            }
        });


        document.getElementById('valor_total').value = total.toFixed(2).replace('.', ',');
}
});