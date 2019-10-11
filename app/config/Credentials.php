<?php

abstract class Credentials
{
    protected static $name = "No reply";
    protected static $email = 'noreply.interstellargames@gmail.com';
    public static $mailCompany = 'interstellargames.company@gmail.com';
    protected static $mailpwd = '@Ragnar321';
    protected static $smtp = 'smtp.gmail.com';
    protected static $smtpAuth = true;
    protected static $encryption = 'tls';
    protected static $port = '587';
    protected static $debug = 0;

    //0 = no_output / 1 = error_reporting + msg / 2 = msg
}