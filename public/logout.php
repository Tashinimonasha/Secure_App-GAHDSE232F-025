 


<?php
require_once '../core/SessionManager.php';
SessionManager::startSession();
SessionManager::destroySession();
header("Location: login.php");
exit();
