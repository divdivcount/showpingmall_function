<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
</p>

## Composer Install

Linux / Unix / Max OS X
- curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin/

Symbolic
- sudo ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

## Copy Laravel env file

.env.example 파일을 .env 파일로 복사를 한다.
- cp .env.example .env

## Laravel lib install

라라벨 프레임워크 및 라이브러리 설치
- composer install

## Create Lavavel app key

artisan 명령으로 app 에서 사용할 기본 키를 생성
- php artisan key:generate

## Config

KakaoDevelopers(https://developer.kakao.com) 발급 받은 어드민키를 config 에 등록
- vi config/kakaopay.php
- properties -> kakao_api_admin_key

예제가 동작할 서버 host 를 등록
- vi config/kakaopay.php
- properties -> sample_host

## Server

Laravel development server 로 실행
- php artisan serve --host=127.0.0.1 --port=8000
