# Sen Tree Pay

Sen Tree Pay is a point system developed and used during 2018 Yuan Ze University College of Informatics Orientation Camp.

Originally hosted at https://2018yzucamp.tyze.me/pay, a clone for demonstration can now be found at https://pay.yzu-ci-camp.tomy.tech.

Designed, built, and maintained in coopertaion with [@tyzesc](https://github.com/tyzesc).

More backgrounds and story of this project can be found in

* Talk [營隊還在用紙鈔？點數系統開發經驗](https://youtu.be/hdywM5jOOfg) given by [@tyzesc](https://github.com/tyzesc) during SITCON 2019.
* Post [四資迎新網站技術文](https://medium.com/@tomy0000000/%E5%9B%9B%E8%B3%87%E8%BF%8E%E6%96%B0%E7%B6%B2%E7%AB%99%E6%8A%80%E8%A1%93%E6%96%87-2470a6d20c00) written by me.



## Installation

1. Application

```bash
git clone https://github.com/tomy0000000/Sen-Tree-Pay.git
cd Sen-Tree-Pay
```

2. Dependencies

   * With Docker

   ```bash
   docker run \
   		--rm --volume="$PWD:/usr/share/nginx/sen-tree-pay" \
		composer install --optimize-autoloader --no-dev
   ```

   * From scratch
   
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

## Configure

1. Copy a .env file

```bash
cp .env.example .env
```

2. Generate an APP_KEY

```bash
echo "base64:"$(openssl rand -base64 32)
```

3. Edit the following field in `.env`

```bash
APP_KEY= # from step 2
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Run

* With Docker Compose

```bash
docker-compose up --detach
docker-compose exec sen-tree-pay php artisan config:cache
docker-compose exec sen-tree-pay php artisan view:cache
```

* Run from scratch 

  ```bash
  php artisan serve
  ```

