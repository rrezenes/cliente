# Api em Php com Laravel utilizando padrão REST, JSON

## Passos rodar a api:
1º Clone a configuração do docker server: 
`git clone https://github.com/rrezenes/docker-server-cliente.git`

2º Entre na pasta que foi gerada(cd docker-server-cliente) e clone o projeto dentro da pasta:
`git clone https://github.com/rrezenes/cliente.git`

3º Suba a aplicação com docker-compose:
`docker-compose up -d --build`

4º Rode o script, para configurar a aplicação:
`bash setup.sh`

Nesta etapa o Servidor se encontra configurado e rodando. Basta acessar http://localhost:8080/api/users


### Testes Unitarios
Para rodar os testes unitarios no container, execute o seguinte comando:
`docker exec -it docker-server-cliente_php_1 vendor/bin/phpunit`

Após rodar os testes unitarios podemos então, conferir o 'Coverage Reports' abra o arquivo html que se encontra em:
`/'onde'/'foi'/'instalado'/docker-server-cliente/cliente/report/indext.html`
