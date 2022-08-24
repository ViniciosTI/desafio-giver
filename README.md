# Desafio giver <b />

Para rodar a aplicação é necessário o docker instalado, e baixar o aplicativo do github,<br />
em seguida fazer os seguintes comandos na pasta root da aplicação<br />

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
