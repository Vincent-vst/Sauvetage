<?php

define('ROOT_URI', 'nuitinfo/');

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['email'])) {
  $_SESSION['email'] = "";
}

if (!isset($_SESSION['logged'])) {
  $_SESSION['logged'] = false;
}

if (!isset($_SESSION['is_admin'])) {
  $_SESSION['is_admin'] = false;
}

if (!isset($_SESSION['first_name'])) {
  $_SESSION['first_name'] = "";
}

if (!isset($_SESSION['last_name'])) {
  $_SESSION['last_name'] = "";
}
