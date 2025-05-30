<?php

require_once __DIR__ . '/../classes/Admin.php';

use cajovna\classes\Admin;

Admin::deleteMessage($_GET['id']);