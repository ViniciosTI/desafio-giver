# Desafio giver

Para rodar a aplicação é necessário o docker instalado, e baixar o aplicativo do github,
em seguida fazer os seguintes comandos na pasta root da aplicação

subir o docker com o comando -d para deixar em segundo plano
docker-compose up -d 

executar os seguintes (exec app para fazer o comando dentro da image app do docker) 
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app php artisan migrate
docker-compose exec app npm run build

caso tudo de certo a aplicação vai abrir pelo navegador pelo caminho:
localhost:8000

pode ser feita alteração na configuração do nginx para rodar na porta 80 caso necessário