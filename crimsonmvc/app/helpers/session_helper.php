<?php
session_start();

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key)
{
    if (empty($_SESSION[$key]))
    {
        return false;
    }

    return $_SESSION[$key];
}

function flash($name = '', $message = '', $class = 'alert alert-success')
{
    //session is empty, yet name and message is provided
    $genNewSession = !empty($name) && !empty($message) && getSession($name);

    $flashTheMessage = empty($message) && !getSession($name);

    if ($genNewSession)
        generateNewSession($name, $message, $class);

    if ($flashTheMessage)
        flashMessageFromSessionAndUnset($name);
}

function generateNewSession($name, $message, $class)
{
    setSession($name, $message);
    setSession($name. '_class', $class);
}

function flashMessageFromSessionAndUnset($name)
{
    $class = !getSession($name . '_class') ? getSession($name . '_class') : '';
    echo '<div class="' . $class . '" id="msg-flash">' . getSession($name) . '</div>';
    unset($_SESSION[$name]);
    unset($_SESSION[$name . '_class']);
}
