# Laravel Guesty API Integration
# How to install?
`composer require jaffarhussain1011/laravel-guesty`
# Configuration
Add following env variables in .env file

`
GUESTY_USERNAME='(API KEY)'
`

`
GUESTY_PASSWORD='(API SECRET)'
`
# How to use?
Get guesty listings?
`
app('guesty')->listings()->all()
`

Get guesty reservations?
`
app('guesty')->reservations()->all()
`

Get guesty owner reservations?
`
app('guesty')->ownerReservations()->all()
`
