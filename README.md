
## simple  blog monolith


## How to install

### Get file
```bash
git clone https://github.com/amirsahra/dornica.git
cd dornica
composer install
php artisan key:generate
```
### Configure your .env file

Database example :
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=db_password
```

Mail example :
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=usernam
MAIL_PASSWORD=password

```
### Create tables
```bash
php artisan migrate
```
### Fake data

```bash
php artisan db:seed
```
### Final steps
```bash
php artisan serv
```
## Default admin
```bash
username : admin
password : 123456789
```

### dornica question
```bash
https://github.com/amirsahra/dornica/tree/master/question
```

License MIT
Copy write amirsahra

