# Conta digital
### Laravel e Bootstrap

- Aplicação que simula uma conta digital
- Saques e depósitos na conta
- Controle de despesas
- Registro de logs

</br>
<a href="https://youtu.be/BpGuW1rblHQgit@github.com:vxt0r/relatorio.git" target="_blank" rel="noopener noreferrer">Vídeo demonstrativo</a>

### Como usar
**É preciso rodar os seguintes comandos na raíz do projeto, após clonar o repositório**

    npm i
    composer install
    mv .env.example .env 
    php artisan cache:clear 
    composer dump-autoload 
    php artisan key:generate

**As configurações da conexão do banco de dados (drive, host, user, password) devem ser feitas no arquivo .env**

**Criar o banco de dados e tabelas**

    php artisan migrate

**Subir dois servidores**

    npm run dev
    php artisan serve


    
