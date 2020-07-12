# Sen Tree Pay

Sen Tree Pay is a point system developed and used during 2018 Yuan Ze University College of Informatics Orientation Camp.

Originally hosted at https://2018yzucamp.tyze.me/pay, a clone for demonstration can now be found at https://yzu-ci-camp.tomy.tech/pay.

Designed, built, and maintained in coopertaion with [@tyzesc](https://github.com/tyzesc).

More backgrounds and story of this project can be found in

* Talk [營隊還在用紙鈔？點數系統開發經驗](https://youtu.be/hdywM5jOOfg) given by [@tyzesc](https://github.com/tyzesc) during SITCON 2019.
* Post [四資迎新網站技術文](https://medium.com/@tomy0000000/%E5%9B%9B%E8%B3%87%E8%BF%8E%E6%96%B0%E7%B6%B2%E7%AB%99%E6%8A%80%E8%A1%93%E6%96%87-2470a6d20c00) written by me.

## Install Guide

* Clone Application

```bash
git clone https://github.com/tomy0000000/Sen-Tree-Pay.git
cd Sen-Tree-Pay
```

* Spawn containers

```bash
docker-compose up --detach
```

* Create users manually by connecting to following database

```bash
mysql://4zi:4zi@127.0.0.1/4zi
```

### Additional guide for changing app configuration

* Change environment variables defined in `docker-compose.yml`

* Change environment variables defined in `.env`

  * Don't modify anything that isn't prefixed with `APP_` and `DB_`
  * `APP_KEY` can be generate by shell command

  ```bash
  echo "base64:"$(openssl rand -base64 32)
  ```

* Rebuild docker image

