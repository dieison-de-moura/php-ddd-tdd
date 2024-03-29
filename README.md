# Projeto PHP + DDD + TDD
Estou desenvolvendo esse projeto para aprofundar os conhecimentos em DDD (Domain-Driven Design) e TDD (Test Driven Development).

O Domain-Driven Design (DDD) é uma abordagem de desenvolvimento de software, ela coloca o foco principal no domínio do problema em questão. O DDD enfatiza a colaboração entre os desenvolvedores, especialistas de negócio e demais partes interessadas, para criar um modelo de domínio compartilhado promovendo o uso da linguagem ubíqua, ou seja, uma linguagem comum e compartilhada entre todos os envolvidos no projeto.
O Objetivo final do DDD é criar um software que seja altamente expressivo, flexível e evolutivo, capaz de resolver problemas complexos de negócio.

O Test Driven Development (TDD), ou Desenvolvimento Orientado a Testes (em português), é uma abordagem de desenvolvimento de software que envolve escrever os testes automatizados antes de implementar o código do sistema.

Resumidamente, o TDD segue um ciclo de trabalho chamado "Red-Green-Refactor".
- Primeiro, escrevemos um teste automatizado que descreve o comportamento desejado do código. Esse teste inicialmente falhará (indicado pela cor vermelha). 
- Em seguida, implementamos o código mínimo necessário para fazer o teste passar (indicado pela cor verde). 
- Por fim, refatoramos o código para melhorar sua qualidade, sem alterar o comportamento observado pelos testes.

# Tecnologias utilizadas
- PHP 8.2
- Docker
- Nginx
- PHPUnit

# Instalação e utilização
### Primeiro é necessário que você tenho docker instalado. Recomendo utilizar Linux ou WSL2.

- Fazer o download do repositório:
```
git clone https://github.com/dieison-de-moura/php-ddd-tdd.git && cd php-ddd-tdd
```

- Criar a pasta data, assim você tem permissão de alteração nela.
```
mkdir docker/mysql/data
```

- Iniciar os containers:
```
docker compose up -d
```

- Caso você tenha composer instalado na sua máquina, utilizar o comando:
```
composer install
```

- Se não tiver o composer, execute o comando através do container:
```
docker exec app-php composer install
```

- Criar tabela products.
    - Você pode cria-la manualmente:
```
CREATE TABLE `products` (`id` int NOT NULL,`name` varchar(255) DEFAULT '',`price` decimal(8,2) DEFAULT NULL,PRIMARY KEY (`id`))ENGINE=memory;
```

- Ou utilizar os comandos:
    - ```docker exec -it db-mysql bash```
    - ```mysql -uroot -proot```
    - ```use php_ddd_tdd;```
    - ```CREATE TABLE `products` (`id` int NOT NULL,`name` varchar(255) DEFAULT '',`price` decimal(8,2) DEFAULT NULL,PRIMARY KEY (`id`))ENGINE=memory;```
    - Para sair do container basta utilizar a sequencia de teclas: Ctrl + P + Q
- Executar os testes do projeto:
```
./vendor/bin/phpunit
```

- Os testes devem ser executados com sucesso!