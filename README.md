# laravel8-jwt-multi-auth

git clone 

composer install

php artisan key:generate

php artisan jwt:secret

# ****************** endpoints ******************
# Auth users

POST	v1/auth/user/register

POST	v1/auth/user/login

GET	      v1/auth/user/me

POST	v1/auth/user/refresh

POST	v1/auth/user/logout

# Auth beneficiaries

POST	v1/auth/beneficiary/register

POST	v1/auth/beneficiary/login

GET	      v1/auth/beneficiary/me

POST	v1/auth/beneficiary/refresh

POST	v1/auth/beneficiary/logout

# Auth delivery_men

POST	v1/auth/delivery/man/register

POST	v1/auth/delivery/man/login

GET	  v1/auth/delivery/man/me

POST	v1/auth/delivery/man/refresh

POST	v1/auth/delivery/man/logout

# **********************************************

