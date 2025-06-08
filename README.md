# Weather CLI Application

Este projeto é uma aplicação de linha de comando (CLI) desenvolvida com o framework [Laravel Zero](https://laravel-zero.com/). Ele utiliza a API OpenWeatherMap para buscar informações sobre o clima de uma cidade específica.

## Requisitos

- PHP >= 8.1
- Composer
- Chave de API do [OpenWeatherMap](https://openweathermap.org/)

## Instalação

1. Clone este repositório ou crie o projeto usando Laravel Zero:
   ```bash
   composer create-project --prefer-dist laravel-zero/laravel-zero weather-cli
   ```

2. Navegue até o diretório do projeto:
   ```bash
   cd weather-cli
   ```

3. Crie o arquivo .env
   ```bash
   touch .env
   ```
  - Adicione sua chave de API do OpenWeatherMap:
     ```env
     OPENWEATHER_API_KEY=SUA_CHAVE_DA_API_AQUI
     ```

## Uso

Execute o comando `weather` seguido do nome da cidade para buscar o clima:

```bash
php appl clima "nome_da_cidade"
```

### Exemplo

```bash
php appl clima "São Paulo"
```

Saída esperada:

```
Clima para São Paulo:
Temperatura: 25°C
Condição: céu limpo
Humidade: 60%
Velocidade do Tempo: 3 m/s
```

## Estrutura do Projeto

- **Comando Principal**: Localizado em `app/Commands/WeatherCommand.php`.
- **Dependências HTTP**: Utiliza o pacote `Illuminate\Http` para realizar requisições à API.

## Gerando um Binário Executável

Laravel Zero permite criar um binário executável para a aplicação. Para gerar o binário, execute:

```bash
php app:build
```

O binário gerado estará disponível no diretório `builds/`.

## Contribuição

Contribuições são bem-vindas! Siga os passos abaixo:

1. Faça um fork deste repositório.
2. Crie uma branch para sua feature ou correção de bug:
   ```bash
   git checkout -b minha-feature
   ```
3. Faça commit das suas alterações:
   ```bash
   git commit -m "Minha nova feature"
   ```
4. Envie para o repositório remoto:
   ```bash
   git push origin minha-feature
   ```
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
