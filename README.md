#DevStagram

- Webservice em arquitetura MVC com PSR-4 e routers<br>
- O diretório a ser colocado esta aplicação deverá ser <strong>Devstagram</strong>, do contrário deverá modificar para o nome desejado no arquivo <strong>/.htaccess</strong> e <strong>/config.php</strong>
- Base de dados MySQL, importar o arquivo <strong>/devstagram.sql</strong>, a base deverá ter esse mesmo nome.

Endpoints:

/users/login //email;pass; {POST}<br>
/users/new   //name;email;pass; {POST}<br>
/users/feed  // (opcionais) offset;per_page; {GET}<br>
/users/{id}  // jwt; {GET;PUT;DELETE}<br>