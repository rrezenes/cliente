# Api em Php com Laravel utilizando padrão REST, JSON

## Passos rodar a api:
1. Clone a configuração do docker server: 
`git clone https://github.com/rrezenes/docker-server-cliente.git`

2. Entre na pasta que foi gerada(cd docker-server-cliente) e clone o projeto dentro da pasta:
`git clone https://github.com/rrezenes/cliente.git`

3. Suba a aplicação com docker-compose:
`docker-compose up -d --build`

4. Rode o script, para configurar a aplicação:*
`bash setup.sh`


### * *Caso não rode a o script utilize os seguintes comandos no terminal:*

*Gerar o arquivo .env:<br /> `docker exec -it php_7 cp .env.example .env`*

*Baixar as dependencias do projeto:<br /> `docker exec -it php_7 composer install`*

*Gerar uma nova app key:<br /> `docker exec -it php_7 php artisan key:generate`*

*Criar a tabelas usuario:<br /> `docker exec -it php_7 php artisan migrate`*

*Popular a base de dados:<br /> `docker exec -it php_7 php artisan db:seed`*

Nesta etapa o Servidor se encontra configurado e rodando. Basta acessar http://localhost:8080/api/users

#### Rotas:

GET `/api/users`        - Lista todos os usuários

GET `/api/users/{id}`   - Lista Usuário em específico

POST `/api/users`       - Cadastra novo usuario

PUT `/api/users/{id}`   - Edita Usuário em específico

DELETE `/api/users/{id}`- Deleta Usuário em específico

#### Parametros classe usuario:
'name' => 'required|min:3|max:255',

'email' => 'unique:users|required|max:255',

'password' => 'required|max:255',

'active' => 'boolean'


### Testes Unitarios
Para rodar os testes unitarios no container, execute o seguinte comando:
`docker exec -it php_7 vendor/bin/phpunit`

Após rodar os testes unitarios podemos então, conferir o 'Coverage Reports' abra o arquivo html que se encontra na seguinte pasta RAIZ do projeto:
`/docker-server-cliente/cliente/report/indext.html`
