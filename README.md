# encurtadorDeLink
Encurtador de link sem banco de dados, usando apenas json. 
Crie um arquivo chamado "encurtador.php" que será responsável por encurtar os links e salvar as informações em um arquivo JSON.
Crie um arquivo chamado "redirecionar.php" para fazer o redirecionamento com base no ID recebido.
Crie um arquivo chamado "links.json" vazio no mesmo diretório onde os arquivos "encurtador.php" e "redirecionar.php" estão localizados.
A lógica aqui é que quando você acessar "encurtador.php", ele exibirá um formulário onde você pode colar o link que deseja encurtar. Após clicar em "Encurtar", ele gerará um ID aleatório de 4 caracteres, salvará o link original e o ID no arquivo "links.json", e exibirá o link encurtado com base no ID.

Quando alguém acessar o link encurtado, como "localhost/encurtador/redirecionar.php?id=ased", o arquivo "redirecionar.php" decodificará o ID, pesquisará no arquivo "links.json" e redirecionará para o link original correspondente se encontrar uma correspondência. Caso não encontre uma correspondência, ele redirecionará para "encurtador.php" novamente.

Lembre-se de que esta é uma implementação simples para fins educacionais. Em uma aplicação real, você deve considerar adicionar mais segurança, como evitar a inserção de links maliciosos ou o uso de ID duplicados. Além disso, você pode usar um banco de dados em vez de um arquivo JSON para melhor escalabilidade.
"estatisticas.php" Este código PHP é responsável por exibir as estatísticas quando é colocado "+" no final da URL. 
