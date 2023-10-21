# ETEC Zona Leste - Wordpress

O projeto é um site desenvolvido em WordPress, utilizando o tema Sage 10 e a biblioteca de estilos Tailwind. Nele, estamos empregando as práticas modernas de desenvolvimento em JavaScript. O objetivo do site é fornecer informações relevantes e atrativas sobre a ETEC Zona Leste, uma escola de ensino médio e técnico localizada na região leste.

## Requisitos

Certifique-se de ter o seguinte requisito instalado na sua máquina:

- Docker (Versão testada 20.10.17)

## Stack utilizada

O projeto utiliza as seguintes tecnologias:

- WordPress
- Sage 10
- Advanced Custom Fields (ACF)
- Tailwind CSS

## Estrutura do Tema

A estrutura do tema Sage 10 segue a seguinte organização de diretórios:

```bash
themes/eteczonaleste/     # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── Providers/        # → Service providers
│   ├── View/             # → View models
│   ├── filters.php       # → Theme filters
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── public/               # → Built theme assets (never edit)
├── functions.php         # → Theme bootloader
├── index.php             # → Theme template wrapper
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme javascript
│   ├── styles/           # → Theme stylesheets
│   └── views/            # → Theme templates
│       ├── components/   # → Component templates
│       ├── forms/        # → Form templates
│       ├── layouts/      # → Base templates
│       └── partials/     # → Partial templates
├── screenshot.png        # → Theme screenshot for WP admin
├── style.css             # → Theme meta information
├── vendor/               # → Composer packages (never edit)
└── bud.config.js         # → Bud configuration
```

## Instalação

Siga as etapas abaixo para configurar e executar o projeto:

**01.** Crie um arquivo `.env` e configure as variáveis de ambiente necessárias.

**02.** No diretório raiz do projeto, execute o seguinte comando para iniciar os contêineres Docker:

```bash
docker-compose up -d
```

**03.** Em seguida, instale as dependências do PHP executando o seguinte comando:

```bash
composer install --ignore-platform-reqs
```


**04.** Verifique os contêineres em execução com o comando:
```bash
docker container ls
```
Localize o contêiner do WordPress na lista exibida.

**05.** Execute o seguinte comando para acessar o shell interativo do contêiner:
```bash
docker exec -it nome_do_contêiner bash
```
Substitua nome_do_contêiner pelo nome do contêiner que você encontrou no passo anterior.

**06.** No shell interativo do contêiner, navegue até o diretório do tema:
```bash
cd wp-content/themes/eteczonaleste
```
A partir daqui, todos os comandos yarn e composer devem ser executados dentro do shell do contêiner para garantir que as versões corretas do PHP e Node.js sejam usadas.

**07.** Execute os seguintes comandos dentro do shell do contêiner, um de cada vez:
```bash
composer install
yarn
yarn build
```
Esses comandos instalarão as dependências do PHP e Node.js e compilarão os ativos do tema.

## Recursos adicionais

Para criar blocos de forma automatizada e realizar outras tarefas, você pode consultar a documentação das seguintes bibliotecas utilizadas no projeto:

- [log1x/acf-composer](https://github.com/Log1x/acf-composer)
- [log1x/navi](https://github.com/Log1x/navi)
- [log1x/poet](https://github.com/Log1x/poet)
- [log1x/sage-directives](https://github.com/Log1x/sage-directives)


As bibliotecas mais importantes são **log1x/acf-composer** e **sage-directives**, que merecem atenção especial.

Por exemplo, para criar blocos automaticamente, você pode executar o seguinte comando:

```bash
wp acorn acf:block NomeBloco --allow-root
```
Isso criará um novo bloco com o nome "NomeBloco".

## Referência

 - [Wordpress Documentation](https://developer.wordpress.org/)
 - [Sage 10 Documentation](https://roots.io/sage/docs/installation)
 - [Tailwind](https://tailwindcss.com/)

## Layout e Asana

- [Layout Figma](https://www.figma.com/file/d5zwqJ6V2KX3QIIuUayYDC/ETEC-Zona-Leste?type=design&node-id=18%3A258&t=CsClEAg0XnSMqHaF-1)
- [Tasks Asana](https://app.asana.com/0/1204690336203362/1204690336203362)

## Autores

- [Jefferson Oliveira](https://github.com/jeffersonrucu)
- [Emily Leme](https://github.com/catmiih)
