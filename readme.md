Sistema desenvolvido para a **comunidade em geral de ArmA** e outros jogos que necessitam de uma organização de partida.
O sistema está em beta então poderá conter bugs, preço ajuda dos que forem utilizar para dar reports dos mesmo.

# Como instalar?
- Para instalar o sistema é bem simples, basta enviar para a hospedagem que desejar em seguida ir até o arquivo que se encontar
application/config.php e alterar a linha 26 $config['base_url'] = 'http://localhost/qg'; colocando onde seu sistema está.
- Antes de configurar o arquivo do banco de dados você deverá criar um banco de dados em sua hospedagem e importar o banco de dados que se 
encontra no diretório tabela com o nome de qg_missoes.sql.
 - Para configurar o banco de dados deverá ir até o arquivo que se encontra em  application/database.php e aletrar as linhas 78, 79 , 80 e 81 com as configurações de seu banco de dados.
- Logar no sistema com o usuário e senha admin

# Bugs
- [ ] trumbowyg não está aparecendo no campo da descrição da missão

# Planos para o futuro
- [ ] Implementação do sistema de e-mails
- [ ] Implementação do sistema de cadastro de usuário independente 
- [ ] Implementação do esqueci minha senha
- [ ] Implementação do sistema de manter conectado
- [ ] Implementação do sistema de recrutamento
- [ ] Implementação OAuth Steam, GMAIL, Facebook
- [ ] Implementação sistema de doações
