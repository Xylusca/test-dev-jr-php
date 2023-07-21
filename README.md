# Projeto API Laravel - Processo Seletivo Jump Tecnologia
Este é um projeto desenvolvido como parte de um processo seletivo para a posição de Desenvolvedor PHP Júnior na empresa Jump Tecnologia. O objetivo do projeto é criar uma API utilizando Laravel, que seja capaz de cadastrar dados enviados via método POST em formato JSON e validá-los antes de armazená-los no banco de dados. Além disso, a API deve oferecer uma consulta via método GET, permitindo a filtragem de resultados através de parâmetros na URL.

## Funcionalidades Principais
Cadastro de dados via método POST em formato JSON.
Validação dos dados antes do armazenamento no banco de dados.
Consulta de dados via método GET com suporte a filtros na URL.

## Utilização
Para utilizar a API, siga os passos abaixo:

1 - Clone este repositório em um diretório de sua preferência:
```shell
git clone https://github.com/seu-usuario/projeto-api-laravel.git
```
2 - Acesse o diretório do projeto:
```shell
cd projeto-api-laravel
```
3 - Instale as dependências do projeto:
```shell
composer install
```
4 - Crie um arquivo .env na raiz do projeto, baseando-se no arquivo .env.example fornecido.

5 - Gere a chave de aplicação:
```shell
php artisan key:generate
```
6 - Crie o banco de dados e configure as credenciais de acesso no arquivo .env.

7 - Execute as migrações do banco de dados para criar as tabelas necessárias:
```shell
php artisan migrate
```
8 - Inicie o servidor de desenvolvimento:
```shell
php artisan serve
```
A API estará disponível nas links:
* Cadastro: http://localhost:8000/api/service-create 
* Consulta: http://localhost:8000/api/service-orders

## Documentação do Postman
Para testar a API utilizando o Postman, acesse a documentação disponível em: [Documenter Postman](https://documenter.getpostman.com/view/27609426/2s93m5zh2w#intro)

## Como Contribuir
Se tiver interesse em contribuir com o projeto, fique à vontade para abrir issues, enviar pull requests ou entrar em contato através do meu perfil no GitHub: seu-usuario

Sinta-se à vontade para fazer sugestões, correções ou melhorias. Toda contribuição é bem-vinda!



The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
