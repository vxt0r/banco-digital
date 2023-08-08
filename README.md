# Conta digital
### Laravel e Bootstrap

- Aplicação que simula uma conta digital
- Saques e depósitos na conta
- Controle de despesas
- Registro de logs
- Login com confirmação de email

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

**OBS: Para o funcionamento da aplicação, as configurações da sua conexão com o banco de dados, assim como as configurações do seu servidor SMTP devem ser definidas no arquivo .env, nas constantes que iniciam com DB e MAIL, respectivamente**

**Criar o banco de dados e tabelas**

    php artisan migrate

**Subir dois servidores**

    npm run dev
    php artisan serve


    
