# Song Rate -App -Laravel

## Introduction

This an app for voting on songs. 
The original idea is to collect songs from different platforms (such as spotify, soundcloud etc...).
As yet, only links from soundcloud has been implemented. 

The main idea is to vote a song up or down. 

## Users and admins

There are two roles; admins and Users. 

### Users
Users in this case are the artists. 
Users can:
* Comment and vote on songs
* Update their profile (username, email, password)

They can create songs by adding title, creators, description, category and url to the song's soundcloud page.

Users can visit other users songs page to vote and comment.

### Admins
Admins can:
* Edit/delete users and songs
* Add and delete categories
* Set user to admin

## Installation

* Git clone
* Composer install
* Edit .env file (eg. append database name, user & password)
* Php artisan key:generate
* Php artisan migrate
* Php artisan db::seed




