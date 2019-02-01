<?php
if (empty($_SESSION['steam_uptodate']) or empty($_SESSION['steam_personaname'])) {
	require 'SteamConfig.php';
	$url = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steamauth['apikey']."&steamids=".$_SESSION['steamid']);
	$content = json_decode($url, true);
	$_SESSION['steam_steamid'] = $content['response']['players'][0]['steamid'];
	$_SESSION['steam_communityvisibilitystate'] = $content['response']['players'][0]['communityvisibilitystate'];
	$_SESSION['steam_profilestate'] = $content['response']['players'][0]['profilestate'];
	$_SESSION['steam_personaname'] = $content['response']['players'][0]['personaname'];
	$_SESSION['steam_lastlogoff'] = $content['response']['players'][0]['lastlogoff'];
	$_SESSION['steam_profileurl'] = $content['response']['players'][0]['profileurl'];
	$_SESSION['steam_avatar'] = $content['response']['players'][0]['avatar'];
	$_SESSION['steam_avatarmedium'] = $content['response']['players'][0]['avatarmedium'];
	$_SESSION['steam_avatarfull'] = $content['response']['players'][0]['avatarfull'];
	$_SESSION['steam_personastate'] = $content['response']['players'][0]['personastate'];
	if (isset($content['response']['players'][0]['realname'])) { 
		   $_SESSION['steam_realname'] = $content['response']['players'][0]['realname'];
	   } else {
		   $_SESSION['steam_realname'] = "Не указано";
	}
	$_SESSION['steam_primaryclanid'] = $content['response']['players'][0]['primaryclanid'];
	$_SESSION['steam_timecreated'] = $content['response']['players'][0]['timecreated'];
	$_SESSION['steam_uptodate'] = time();
	$_SESSION['steam_gameextrainfo'] = $content['response']['players'][0]['gameextrainfo'];
	$_SESSION['gameserverip'] = $content['response']['players'][0]['gameserverip'];
}
if ($_SESSION['steam_uptodate'] and $_SESSION['steam_personaname']){

	$url1=file_get_contents("http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=".$steamauth['apikey']."&include_played_free_games=1&steamid=".$_SESSION['steamid']."&include_appinfo=1");
	$content1=json_decode($url1,true);
	$_SESSION['game_count'] = $content1['response']['game_count'];
	$_SESSION['games'] = $content1['response']['games'];
	$length = count($content1['response']['games']);
	$games = $_SESSION['games'];
	$gamecount=$steamprofile['game_count'];
}

$steamprofile['steamid'] = $_SESSION['steam_steamid'];
$steamprofile['communityvisibilitystate'] = $_SESSION['steam_communityvisibilitystate'];
$steamprofile['profilestate'] = $_SESSION['steam_profilestate'];
$steamprofile['personaname'] = $_SESSION['steam_personaname'];
$steamprofile['lastlogoff'] = $_SESSION['steam_lastlogoff'];
$steamprofile['profileurl'] = $_SESSION['steam_profileurl'];
$steamprofile['avatar'] = $_SESSION['steam_avatar'];
$steamprofile['avatarmedium'] = $_SESSION['steam_avatarmedium'];
$steamprofile['avatarfull'] = $_SESSION['steam_avatarfull'];
$steamprofile['personastate'] = $_SESSION['steam_personastate'];
$steamprofile['realname'] = $_SESSION['steam_realname'];
$steamprofile['primaryclanid'] = $_SESSION['steam_primaryclanid'];
$steamprofile['timecreated'] = $_SESSION['steam_timecreated'];
$steamprofile['uptodate'] = $_SESSION['steam_uptodate'];
$steamprofile['game_count'] = $_SESSION['game_count'];


// $link=new mysqli("localhost","root","","Steam");
//     if(!$link){
//         die("server doens't exist");
//     }
$created=$_SESSION['steam_timecreated'];
$realname=$_SESSION['steam_realname'];
$currentServer=$_SESSION['gameserverip'];
$currentGame=$_SESSION['steam_gameextrainfo'];
$fullavatar=$steamprofile['avatarmedium'];
$id=$steamprofile['steamid'];
$name=$steamprofile['personaname'];
$url=$steamprofile['profileurl'];
$logoff=gmdate("Y-m-d H:i:s", $steamprofile['lastlogoff']);
$avatar=$steamprofile['avatar'];
$avatarfull=$steamprofile['avatarfull'];
$state=$steamprofile['personastate'];
$visible=$steamprofile['communityvisibilitystate'];

// $query1="select max(ID) from Users";
// $res = $link->query($query1);
// $incr = $res->fetch_array(MYSQLI_NUM);
// $query="insert into Users(ID,SteamID,Name,Url,Avatar,State,Visible,Logoff,Gamecount) values(($incr[0]+1),'$id','$name','$url','$avatar',$state,$visible,'$logoff',$gamecount)";
// $link->query($query);
// $querydata="select * from Users where ID=($incr[0]+1)";
// $res1 = $link->query($querydata);
// $data = $res1->fetch_array(MYSQLI_ASSOC);
// $guery1="select max(ID) from OwnedGames";
// $gres = $link->query($guery1);
// $gincr = $gres->fetch_array(MYSQLI_NUM);
//for($i = 0; $i < $length; $i++){
	// $gIMG = $games[$i]['img_logo_url'];
	// $gID = $games[$i]['appid'];
	// $g4EVER = $games[$i]['playtime_forever'];
	// $gNAME = $games[$i]['name'];
	// $icrem = ++$gincr[0];
	// $guerygame = "insert into OwnedGames(ID,GameID,Name,Play4ever,Imag) values($icrem,'$gID','$gNAME',$g4EVER,'$gIMG')";
	// $link->query($guerygame);
//}
// $link->close();
?>