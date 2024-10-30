window.fetchSeller = function() {
    const store = document.getElementById('loja_id').value;
    const baseUrl = import.meta.env.VITE_APP_URL;
    const url = `${baseUrl}/api/vendedores-loja`;
    const vendedorSelect = document.getElementById('vendedor_id');

        if (store === "D") {
            vendedorSelect.innerHTML = '<option value="D">Selecione um vendedor</option>';
            return;
        }
        axios.post(url, { store: store })
            .then(response => {
                vendedorSelect.innerHTML = '<option value="D">Selecione um vendedor</option>';
                response.data.forEach(seller => {
                    const option = document.createElement('option');
                    option.value = seller.id;
                    option.textContent = seller.nome;
                    vendedorSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erro ao buscar vendedores:', error));
}