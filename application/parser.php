<?php 
//Parser https://raw.githubusercontent.com/lsv/fifa-worldcup-2018/master/data.json
set_time_limit(0);
$tmp_local_file = './dataset/master_data.json';
$tmp_file_stadiums = './dataset/stadiums_data.json';
$tmp_file_tvchannels = './dataset/tvchannels_data.json';
$tmp_file_teams = './dataset/teams_data.json';
$tmp_file_groups = './dataset/groups_data.json';
$tmp_file_knockout = './dataset/knockout_data.json';

if(!is_file($tmp_local_file)){
	$tmp_content = file_get_contents('https://raw.githubusercontent.com/lsv/fifa-worldcup-2018/master/data.json');
	if(!file_put_contents($tmp_local_file, $tmp_content)){
		die("error saving file...");
	}	
}
else{
	$tmp_content = file_get_contents($tmp_local_file);
}

$tmp_exec_stadium_ar = array();
$tmp_exec_teams_ar = array();
$tmp_exec_groups_ar = array();
$tmp_exec_knockout_ar = array();

echo "<pre>";
$counter = 0;
$tmp_json_data = json_decode($tmp_content);
foreach ($tmp_json_data as $key => $value) {
	//echo "<br>".$key;
	
	/*if($key === 'stadiums'){
		foreach ($value as $key_in => $value_in) {
			$tmp_img = (string) $value_in->image;
			$tmp_image_ar = pathinfo($tmp_img);
			$tmp_name = (string) $value_in->name;
			$tmp_name = strtolower($tmp_name);
			$tmp_name = preg_replace('/[^a-z0-9]/i','_',$tmp_name);
			$value_in->image_id = $tmp_name.'.'.$tmp_image_ar['extension'];		
			$tmp_local_pix_path = './pix/stadiums/'.$value_in->image_id;
			if(!is_file($tmp_local_pix_path)){
				$tmp_img_data = file_get_contents($tmp_img);
				file_put_contents($tmp_local_pix_path, $tmp_img_data);
			}
			$value_in->image = urldecode($tmp_image_ar['basename']);			
			$tmp_exec_stadium_ar[] = $value_in;
			$counter++;
		}
	}*/

	/*if($key === 'teams'){
		foreach ($value as $key_in => $value_in) {			
			$tmp_img = (string) $value_in->flag;
			$tmp_image_ar = pathinfo($tmp_img);
			$tmp_name = (string) $value_in->name;
			$tmp_name = strtolower($tmp_name);
			$tmp_name = preg_replace('/[^a-z0-9]/i','_',$tmp_name);
			$value_in->image_id = $tmp_name.'.'.$tmp_image_ar['extension'];		
			$tmp_local_pix_path = './pix/flags/'.$value_in->image_id;
			if(!is_file($tmp_local_pix_path)){
				$tmp_img_data = file_get_contents($tmp_img);
				file_put_contents($tmp_local_pix_path, $tmp_img_data);
			}
			$value_in->flag = urldecode($tmp_image_ar['basename']);			
			$tmp_exec_teams_ar[] = $value_in;
			$counter++;
		}
	}*/

	/*if($key === 'groups'){
		foreach ($value as $key_in => $value_in) {			
			$tmp_exec_groups_ar[$key_in] = $value_in;
			$counter++;
		}
	}*/

	/*if($key === 'knockout'){
		foreach ($value as $key_in => $value_in) {			
			$tmp_exec_knockout_ar[$key_in] = $value_in;
			$counter++;
		}
	}*/
	
}

if(!is_file($tmp_file_stadiums)){
	if(!file_put_contents($tmp_file_stadiums, json_encode($tmp_exec_stadium_ar))){
		die("error saving file...".$tmp_file_stadiums);
	}		
}

if(!is_file($tmp_file_teams)){
	if(!file_put_contents($tmp_file_teams, json_encode($tmp_exec_teams_ar))){
		die("error saving file...".$tmp_file_teams);
	}		
}

if(!is_file($tmp_file_groups)){
	if(!file_put_contents($tmp_file_groups, json_encode($tmp_exec_groups_ar))){
		die("error saving file...".$tmp_file_groups);
	}		
}

if(!is_file($tmp_file_knockout)){
	if(!file_put_contents($tmp_file_knockout, json_encode($tmp_exec_knockout_ar))){
		die("error saving file...".$tmp_file_knockout);
	}		
}
?>