<?php
include "../config/database.php";
include "../repository/resultRepository.php";

$result = getResult();


$template = "result";
include "layout.phtml";