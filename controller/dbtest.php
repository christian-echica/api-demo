<?php

require_once('db.php');
require_once('../model/Response.php');
try {
	$writeDB = DB::connectWriteDB();
	$readDB = DB::connectReadDB();

	//I need message to throw that it is success!
	$response = new Response();
	$response->setHttpStatusCode(200);
	$response->setSuccess(true);
	$response->addMessage("Database Connected Dick Man! ");
	$response->send();
}
catch(PDOException $ex) {
	$response = new Response();
	$response->setHttpStatusCode(500);
	$response->setSuccess(false);
	$response->addMessage("Database connection error. Please check the problem ");
	$response->send();
	exit;
}