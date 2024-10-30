document.addEventListener('DOMContentLoaded', function () {
    
    const checkboxes = document.querySelectorAll('input[name="produto_id[]"]');
    const quantities = document.querySelectorAll('input[name="produto_quantidade[]"]');
    const totalValue = document.getElementById('valor_total');
    const originalTotalValue = parseFloat(totalValue.value.replace(',', '.'));

    let isQuantityChanged = false;
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const productId = checkbox.value;
            const quantityField = document.querySelector(`input[name="produto_quantidade[]"][data-id="${productId}"]`);

            if (checkbox.checked) {
                quantityField.value = 1;
            } else {
                quantityField.value = '';
            }

            if(totalValue != saleTotalValue){
                calculateTotal();
            }
        });
    });

    quantities.forEach(quantity => {
        quantity.addEventListener('input', () => {
            isQuantityChanged = true;
            calculateTotal();
        });
    });

    document.getElementById('editSaleForm').addEventListener('submit', function (event) {
        if (!isQuantityChanged) {
            totalValue.value = originalTotalValue.toFixed(2).replace('.', ',');
        }
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