📝 Descrição do SistemaO Pisada Prime é um sistema web desenvolvido em Laravel para a gestão e divulgação de shows e eventos. O projeto aplica o padrão de arquitetura MVC, isolamento de validações via Form Requests (respeitando o princípio SRP), persistência em banco de dados PostgreSQL com Eloquent ORM, e controle de acesso granular em três níveis de usuários (Admin, Gerente e Usuário) utilizando Laravel Breeze, Middlewares e Policies.  
🛠️ Tecnologias UtilizadasPHP 8.2+ & Laravel 11  PostgreSQL (Banco de Dados Relacional)  Laravel Breeze (Autenticação)  Blade Components & Tailwind CSS (Interface e Views)  

2. Instalar as Dependências do PHP e Node.jsBash
composer install
npm install
npm run build
3. Configurar o Arquivo de Ambiente .envCopie o arquivo de exemplo de ambiente:  Bash
cp .env.example .env
php artisan key:generate

Abra o arquivo .env gerado e ajuste as credenciais de conexão com o seu banco de dados PostgreSQL:  Snippet de códigoDB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=pisada_prime
DB_USERNAME=postgres
DB_PASSWORD=sua_senha

4. Recriar o Banco de Dados e Executar os SeedersExecute o comando abaixo para construir a estrutura do banco e popular as tabelas com os dados de teste e usuários iniciais:  Bash
php artisan migrate:fresh --seed

5. Iniciar o Servidor de DesenvolvimentoBash
php artisan serve

Acesse a aplicação no seu navegador pelo endereço: [http://127.0.0.1:8000](http://127.0.0.1:8000)  
🔐 Credenciais dos Usuários de TesteO sistema implementa três níveis distintos de privilégios (role) na tabela de usuários: 
Administrador  E-mail: admin@pisadaprime.com  Senha: 12345678  Permissões: Acesso total (visualiza, cadastra, edita e exclui eventos).  
Gerente  E-mail: gerente@pisadaprime.com  Senha: 12345678  Permissões: Pode visualizar, cadastrar e editar eventos. Sem permissão para excluir.  
Usuário (Cliente)  E-mail: usuario@pisadaprime.com  Senha: 12345678  Permissões: Apenas visualiza a listagem dos eventos cadastrados.    