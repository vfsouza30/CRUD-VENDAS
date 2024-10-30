document.querySelectorAll('input[name="cpf"]').forEach(function(cpfInput) {
    cpfInput.addEventListener('blur', function() {
        cpfInput.value = cpfInput.value.replace(/\D/g, '');
        const cpfError = cpfInput.nextElementSibling;
        if (cpfInput.value.length !== 11) {
            cpfError.style.display = 'block';
        } else {
            cpfError.style.display = 'none';
        }
    });
});