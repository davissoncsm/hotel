<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


O teste foi desenvolvido utilizando:
- Laravel 10
- Tailwind css
- Livewire
- Docker

O teste foi desenvolvido seguindo os requisitos informados mas conta com uma separação de camadas diferente da sugerida pelo Laravel

Controllers > Services > Actions > Repositories > Entities 

Além de utlizar DTOs para trafegar dados entre as camadas

## Executar

Para testar o projeto é necessario ter o Docker instalado

- Executar o comando: `docker compose up -d`
- Executar o comando: `composer install`
- Renomear  o arquivo: `.env.example` para `.env`
- Executar o comando: `php artisan key:generate`
- O projeto ira rodar na porta: `8080`
- A rota inicial é: `/hotel`
- Para popular o banco de dados: `php artisan migrate --seed` 



## Testes

Antes de rodar os testes pode ser necessário rodar os comandos:
- `php artisan cache:clear && php artisan config:clear`
- `php artisan optimize `

Para rodar os testes basta executar um dos comandos:
- `./vendor/bin/phpunit`
- `php artisan test `

## API

Para executar a api basta usar um client http e fazer requisições nas seguiintes rotas:

- `GET api/hotel` Retorna todos os hoteis com seus respectivos quartos
- `GET api/hotel/{id}/rooms` Retorna todos os quartos de um determinado hotel
- `POST api/hotel` Envia um payload para cadastrar um hotel com seus respectivos quartos

Payload:
```
{
    "hotel":{
        "address":"endereço de teste",
        "city": "cidade de teste",
        "state": "SP",
        "zipCode": "33250580",
        "website":"http://teste.com"
    },
    "rooms": [
        {
            "name": "nome do quarto 1",
            "description": "Descrição do quarto 1"
        },
        {
            "name": "nome do quarto 2",
            "description": "Descrição do quarto 2"
        }
    ]
}
```

