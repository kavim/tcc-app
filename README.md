# ProBi

Projeto TCC KevinMM

## Instalação

### Para instalar as depências no windows

```
composer install --ignore-platform-reqs
```

Devido ao laravel/horizon não suportar o Windows, devemos instalar as dependências
com a flag `--ignore-platform-reqs`.

### Criar arquivo de ambiente

```
cp .env.example .env
```

### Gerar chave do Laravel

```
php artisan key:generate --ansi
```

### Criar BD

```
mysql -u root

mysql> create database probi
```

### Rodar migrations para criar o BD

```
php artisan migrate
```

---
