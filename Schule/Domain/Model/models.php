<?php

namespace Schule\Domain\Model;

class user
{
    var $id;
    var $name;
    var $password;
    var $email;
    var $aktiv;
    var $timestamp;
}

class post
{
    var $id;
    var $user_id;
    var $category_id;
    var $text;
    var $title;
    var $timestamp;
    var $countreplys;
}

class reply
{
    var $id;
    var $user_id;
    var $post_id;
    var $text;
    var $timestamp;
}

class category
{
    var $id;
    var $title;
    var $count;
}