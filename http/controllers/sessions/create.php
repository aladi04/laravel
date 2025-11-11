<?php
use models\Session;
view('sessions/create.view.php',[
    "errors" => Session::get('errors')
]);