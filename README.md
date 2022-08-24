# Desafio giver <b />

Para rodar a aplicação é necessário o docker instalado, e baixar o aplicativo do github,<br />
em seguida fazer os seguintes comandos na pasta root da aplicação<br />

Antes de inicializar a aplicação é necessário criar o arquivo .env a partir do .env.exemple<br />
as configurações do .env fica a sua escolha, mas alerto para não esquecer de alterar as configurações,<br />
da conneção do banco mysql, ficaria algo parecido com isso<br />

DB_CONNECTION=mysql<br />
DB_HOST=db<br />
DB_PORT=3306<br />
DB_DATABASE=desafio<br />
DB_USERNAME=general<br />
DB_PASSWORD=12345<br />

subir o docker com o comando -d para deixar em segundo plano<br />
docker-compose up -d <br />

executar os seguintes (exec app para fazer o comando dentro da image app do docker) <br />
docker-compose exec app composer install <br />
docker-compose exec app npm install<br />
docker-compose exec app php artisan migrate<br />
docker-compose exec app npm run build<br />

caso tudo de certo a aplicação vai abrir pelo navegador pelo caminho:<br />
localhost:8000<br />

pode ser feita alteração na configuração do nginx para rodar na porta 80 caso necessário<br />
