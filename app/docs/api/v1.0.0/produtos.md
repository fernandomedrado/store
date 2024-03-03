## v1.0.0 API: Produtos
Esta API permite fazer a busca, inserção, alteração e exclusão de registros sobre produtos

### URL:
```
GET product/
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela rota de listagem:

| Tipo       | Chave               | Obrigatório | Valor    | Formato      |
|------------|---------------------|-------------|----------|--------------|
| Query/Body | product_id          |      S      |`integer` |      1       |
| Query/Body | product_name        |      S      |`string`  |      1       |
| Query/Body | product_description |      S      |`string`  |      1       |
| Query/Body | product_price       |      S      |`float`   |     48.1     |
| Query/Body | page_limit          |      N      |`integer` |      1       |
| Query/Body | page                |      N      |`integer` |      1       |

## Referências
- [História] - (../../docs/stories/v1.0.0/produtos.md)
- [API's] - (../../docs/api/main.md)
