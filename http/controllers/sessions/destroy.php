<?php
use models\Authenticator;

//logout();
Authenticator::logout();

header('location: /');
exit();