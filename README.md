<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Ping project
<pre>
    GET /v1/ping
    Content-Type: application/json
    Accept: application/json
</pre>

## Registration

<pre>
    POST /v1/registration
    Content-Type: application/json
    Accept: application/json
    {"name": string, "email": string, "phone": string, "password": string}
</pre>

## Login

<pre>
    POST /v1/login
    Content-Type: application/json
    Accept: application/json,
    {"login": 'string, email or phone, "password": string}
</pre>

## Products

<pre>
    GET /v1/products
    Content-Type: application/json
    Accept: application/json
    Headers: 
            Authorization: "token" 
</pre>


