<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Тестовое задание
##### "Уменьшитель URL"
- Пользователю предоставляется поле для ввода URL, 
по нажатию кнопки "Уменьшить" предоставляется уникальная короткая ссылка с текущим доменом сайта (Например, http://localhost/aBcD).
- При переходе по уменьшенной ссылке юзер будет перенаправлен на исходную страницу.
- Пользователь должен иметь возможность создать свою уникальную короткую ссылку.
- Должна быть возможность создавать ссылки с ограниченным сроком жизни.

Требование: решить поставленную задачу используя: · PHP 7+ · ООП · Laravel

## Развертывание
- Склонировать репозиторий `git clone https://github.com/Kemel91/bnberry.git folder`
- Перейти в папку с проектом `cd folder` и запустить команду `/bin/bash .build/run.sh`
- Дождавшись окончания сборки контейнера перейти по адресу `http://localhost`
- Зарегистрироваться, после вас перенаправит на страницу добавления ссылки

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
