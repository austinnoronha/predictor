<?php 
set_time_limit(0);
//error_reporting(0);

//Site Confs
define('APP_NAME','Predictor');
define('APP_DESCRIPTION', 'A Dino AI that tries to predict the outcome of a SPORTS Event by evaluating the past events & statistics');
define('APP_KEYWORDS', 'Sports Prediction, Game Prediction, Prediction Analysis, Predict Win or Loss, Sports, Games');
	
//Templates
define('TPL_VIEWS','./views/');

include_once('functions.inc.php');

//Controller mode
$mode = get_request('mode');

switch ($mode) {
	case 'home':
	default:{
		include_once(TPL_VIEWS . 'home.php');
		break;
	}
}
?>