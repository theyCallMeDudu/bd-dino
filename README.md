# BdDino 🦖
 
Este é um projeto de CRUD desenvolvido com base na TALL stack (Tailwind - Alpine - Livewire - Laravel) como parte técnica da 3ª avaliação de desempenho de trainees Globalweb.

O sistema BdDino tem como objetivo cadastrar famílias de dinossauros, bem como tipos e os próprios dinossauros, com alguns dados sobre estes tópicos.

Segue abaixo o passo a passo para instalação do projeto em sua máquina:

1. Faça o clone do projeto via git;
2. Usando o cmd ou terminal, vá até a pasta do onde clonou o projeto;
3. Copie o arquivo .env.example para .env na pasta do projeto. Pode-se usar para Windows: `copy .env.example .env`, ou, `cp .env.example .env`, para Ubuntu;
4. No arquivo .env gerado, altere as informações de nome do banco de dados (DB_DATABASE), nome de usuário (DB_USERNAME) e senha (DB_PASSWORD) de acordo com as configurações da sua máquina;
5. Execute `php artisan key:generate`;
6. Execute `php artisan migrate` (este comando criará as tabelas da aplicação em seu banco de dados);
7. Execute `php artisan db:seed` (este comando populará as tabelas de domínio [`tb_familia_dinossauro` e `tb_tipo_dinossauro`]);
7. Execute `php artisan storage:link`;
8. Execute `php artisan serve`;
9. Acesse localhost:8000 (padrão Laravel) ou na porta em que sua máquina estiver configurada.

Ps.: A pasta `database`, localizada na raiz do projeto, contém informações sobre o banco de dados, como por exemplo, o modelo de dados físico da aplicação (`bd_dino.pdm`).
