<?php 

require_once('Connections/baglantim.php'); 

function GetIP() {
	
	if (getenv("HTTP_CLIENT_IP")) {

		$ip = getenv("HTTP_CLIENT_IP"); 
	} elseif (getenv("HTTP_X_FORWARDED_FOR")){

		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		
		if (strstr($ip, ',')) { 
			
			$tmp = explode (',', $ip); 
			$ip = trim($tmp[0]); 
		}
	} else {

		$ip = getenv("REMOTE_ADDR");
	}
	
	return $ip;	

}

if (!function_exists("GetSQLValueString")) {

	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		
		if (PHP_VERSION < 6) { 
			
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; 
		}
		
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  
		switch ($theType) { 
			
			case "text": 
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;   
    
      		case "long":
    		case "int":
      			
    			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
      			break;
    
      		case "double":
      			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      			break;
    
      		case "date":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;
    
      		case "defined":
      			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      			break;
		}
  
		return $theValue;
	}
}


if (!function_exists("GetSQLValueString")) {
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		
		if (PHP_VERSION < 6) { 
			
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; 
		}
		
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

		switch ($theType) { 
			
			case "text":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;   
    
      		case "long":
    		case "int":
      			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
      			break;
    
      		case "double":
      			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      			break;
    
      		case "date":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;
    
      		case "defined":
      			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      			break;
  		}
  
  		return $theValue;
	}
}

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
	
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form6")) {

	$updateSQL = sprintf("UPDATE uyelerim SET giris_IP=%s, giris_tarih=%s, giris_saat=%s, yedek=%s WHERE username=%s AND password=%s",
                       GetSQLValueString($_POST['gizli_IPgiris'], "text"),
                       GetSQLValueString($_POST['gizli_tarih'], "date"),
                       GetSQLValueString($_POST['gizli_IPgiris'], "date"),
                       GetSQLValueString($_POST['gizli_yedek'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));
                       
	mysql_select_db($database_baglantim, $baglantim); 
	$Result1 = mysql_query($updateSQL, $baglantim) or die(mysql_error());
	$updateGoTo = "giris/anasayfa.php"; 
	if (isset($_SERVER['QUERY_STRING'])) {
		
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
  
	header(sprintf("Location: %s", $updateGoTo));
}

if (!function_exists("GetSQLValueString")) {
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		
		if (PHP_VERSION < 6) { 
			
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		}
  
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

		switch ($theType) { 
			
			case "text":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;   
    
      		case "long":
    		case "int":
      			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
      			break;
    
      		case "double":
      			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      			break;
    
      		case "date":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;
    	
      		case "defined":
      			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      			break;
		}
  
		return $theValue;
	}
}

if (!function_exists("GetSQLValueString")) {
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		
		if (PHP_VERSION < 6) { 
			
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue; 
		}
  
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  
		switch ($theType) { 
			
			case "text":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;   
    
      		case "long":
    		case "int":
     			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
      			break;
    
      		case "double":
      			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      			break;
    
      		case "date":
      			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      			break;
    
      		case "defined":
      			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      			break;
  		}
  
  		return $theValue;
	}
}

mysql_select_db($database_baglantim, $baglantim);
$query_haberler = "SELECT * FROM haberler ORDER BY `no` DESC";
$haberler = mysql_query($query_haberler, $baglantim) or die(mysql_error());
$row_haberler = mysql_fetch_assoc($haberler);
$totalRows_haberler = mysql_num_rows($haberler);

mysql_select_db($database_baglantim, $baglantim);
$query_msjlist = "SELECT * FROM duvar_yazilari WHERE onay = 1 ORDER BY tarih DESC";
$msjlist = mysql_query($query_msjlist, $baglantim) or die(mysql_error());
$row_msjlist = mysql_fetch_assoc($msjlist);
$totalRows_msjlist = mysql_num_rows($msjlist);

mysql_select_db($database_baglantim, $baglantim);
$query_dersler = "SELECT * FROM dersler ORDER BY `no` DESC";
$dersler = mysql_query($query_dersler, $baglantim) or die(mysql_error());
$row_dersler = mysql_fetch_assoc($dersler);
$totalRows_dersler = mysql_num_rows($dersler);

mysql_select_db($database_baglantim, $baglantim);
$query_reklam = "SELECT * FROM reklamlar ORDER BY `no` ASC";
$reklam = mysql_query($query_reklam, $baglantim) or die(mysql_error());
$row_reklam = mysql_fetch_assoc($reklam);
$totalRows_reklam = mysql_num_rows($reklam);

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
	
	session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];

if (isset($_GET['accesscheck'])) { 
	
	$_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
	
	$loginUsername = $_POST['username'];
  	$password = $_POST['password'];
  	$MM_fldUserAuthorization = "level";
  	$MM_redirectLoginSuccess = "giris/anasayfa.php";
  	$MM_redirectLoginFailed = "hatagiris.php";
  	$MM_redirecttoReferrer = false;
  	mysql_select_db($database_baglantim, $baglantim);
   
  	$LoginRS__query	= sprintf("SELECT username, password, level FROM uyelerim WHERE username=%s AND password=%s",
  						GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));
   
  	$LoginRS = mysql_query($LoginRS__query, $baglantim) or die(mysql_error());
  	$loginFoundUser = mysql_num_rows($LoginRS);
  
  	if ($loginFoundUser) {
  		
  		$loginStrGroup  = mysql_result($LoginRS,0,'level');
   
 		if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}

 		//declare two session variables and assign them
    	$_SESSION['MM_Username'] = $loginUsername;
    	$_SESSION['MM_UserGroup'] = $loginStrGroup;
    
    	if (isset($_SESSION['PrevUrl']) && false) {
    		
    		$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    	}
    
    	header("Location: " . $MM_redirectLoginSuccess ); 
  	} else {
    
  		header("Location: ". $MM_redirectLoginFailed );
  	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>İlköğretim öğrencileri için ingilizce dersler</title>
<style type="text/css">
body {
 margin-left: 0px;
 margin-top: 0px;
}
a {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 color: #FFF;
 font-weight: bold;
}
a:link {
 text-decoration: none;
 color: #000;
}
a:visited {
 text-decoration: none;
 color: #000;
}
a:hover {
 text-decoration: none;
 color: #0C0;
}
a:active {
 text-decoration: none;
 color: #000;
}
#genelalan {
 margin: 0px;
 padding: 0px;
 height: 905px;
 width: 1166px;
 background: #FF9;
}
#reklambolgesi {
 margin: 0px;
 padding: 0px;
 float: left;
 height: 900px;
 width: 150px;
 border: 2px inset #666;
 background: #F00;
}
#ortabolge {
 margin: 0px;
 padding: 0px;
 float: left;
 height: 900px;
 width: 600px;
}
#ortaust_bolum {
 margin: 0px;
 padding: 0px;
 height: 250px;
 width: 600px;
}
#ortaust_solbolum {
 margin: 0px;
 padding: 0px;
 float: left;
 height: 250px;
 width: 400px;
}
#logobolumu {
 margin: 0px;
 padding: 0px;
 float: left;
 height: 250px;
 width: 200px;
}
#loginbolumu {
 margin: 0px;
 padding: 0px;
 height: 200px;
 width: 400px;
}
#asilloginbolumu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 margin: 0px;
 padding: 0px;
 height: 125px;
 width: 400px;
}
#anasayfamyapbolumu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 margin: 0px;
 padding: 0px;
 height: 75px;
 width: 400px;
}
#menubolumu {
 margin: 0px;
 padding: 0px;
 height: 50px;
 width: 400px;
 background: #F00;
}
.mmmmmmenu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 padding-left: 2px;
}
.menumenu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #FFF;
 text-align: center;
 margin: 0px;
 padding: 0px;
 height: 25px;
 width: 100px;
}
#haberlerboumu {
 margin: 0px;
 padding: 0px;
 height: 250px;
 width: 400px;
 border-top: 5px inset #333;
}
#derslerbolumu {
 margin: 0px;
 padding: 0px;
 height: 475px;
 width: 600px;
}
#extrabolum {
 background: #FF0;
 margin: 0px;
 padding: 0px;
 height: 175px;
 width: 600px;
}
#derslerbaslikbolgesi {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 16px;
 font-weight: bold;
 color: #000;
 text-align: center;
 margin: 0px;
 padding: 0px;
 height: 25px;
 width: 600px;
 border-bottom: 2px inset #00F;
}
#ziyaretcibilgi_bolumu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 margin: 0px;
 padding: 0px;
 height: 175px;
 width: 170px;
 float: left;
}
#anketbolumu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 margin: 0px;
 padding: 0px;
 float: left;
 height: 175px;
 width: 180px;
}
#kamerabolumu {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 margin: 0px;
 padding: 0px;
 float: left;
 height: 175px;
 width: 250px;
}
.ziyaretcibilgisibaslik {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 text-align: center;
 border-bottom: 1px inset #00F;
 height: 20px;
 margin-top: 10px;
 padding-top: 10px;
}
.digerzbilgileri {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 padding-right: 3px;
 padding-left: 3px;
}
#derslericerikbolgesi {
 margin: 0px;
 padding: 0px;
 height: 450px;
 width: 600px;
 overflow:auto;
}
.dersno {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 14px;
 font-weight: bold;
 color: #000;
 height: 11px;
 text-align: left;
}
.derstarihi {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 text-align: right;
 padding-right: 4px;
 padding-left: 4px;
 border-bottom: 1px inset #00F;
}
.ders_basligi {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 height: 11px;
}
.ders_icerigi {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 padding-right: 4px;
 padding-left: 4px;
 text-align: justify;
}
.haberbasliklari {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 height: 25px;
 padding-right: 4px;
 padding-left: 4px;
 border-bottom: 1px inset #00F;
}
#mesajyaz_bolumu {
 margin: 0px 0px 7px;
 padding: 0px 0px 7px;
 height: 100px;
 width: 400px;
}
#mesajlist_bolumu {
 margin: 0px;
 padding: 0px;
 height: 543px;
 width: 400px;
 overflow:auto;
}
.ml_user {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 12px;
 font-weight: bold;
 color: #000;
 padding-right: 4px;
 padding-left: 4px;
 text-align: left;
 height: 12px;
}
.ml_tarih {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 text-align: right;
 height: 12px;
 padding-right: 4px;
 padding-left: 4px;
 border-bottom: 1px inset #00F;
}
.ml_icerik {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: normal;
 color: #000;
 text-align: justify;
 padding-right: 4px;
 padding-left: 4px;
}
.msjyazimi {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 text-align: justify;
 margin: 0px;
 padding: 0px;
 height: 82px;
 width: 396px;
 background: url(img/duvar.gif);
}
.butonmsjyaz {
 font-family: Tahoma, Geneva, sans-serif;
 font-size: 11px;
 font-weight: bold;
 color: #000;
 text-align: center;
 height: 18px;
 width: 400px;
 margin: 0px;
 padding: 0px;
}
#solbolge {
 background: url(img/duvar.gif) repeat-y;
 margin: 0px;
 padding: 0px;
 float: left;
 height: 900px;
 width: 400px;
 border-top: 5px inset #666;
 border-right: 5px inset #666;
 border-left: 5px inset #666;
}
</style>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i =3) { test=args[i 2]; val=document.getElementById(args);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors ='- ' nm ' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors ='- ' nm ' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p 1);
            if (num<min || max<num) errors ='- ' nm ' must contain a number between ' min ' and ' max '.\n';
      } } } else if (test.charAt(0) == 'R') errors  = '- ' nm ' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n' errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/tr_TR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<div id="genelalan">
  <div id="solbolge">
    <div id="haberlerbolumu">
      <form id="form1" name="form1" method="post" action="">
        <marquee behavior="scroll" direction="up" width="400" height="230" scrollamount="2" scrolldelay="0" onMouseOver='this.stop()' onMouseOut='this.start()'>
          <table width="395" border="0" cellpadding="0" cellspacing="0">
            <?php do { ?>
            <tr>
              <td class="haberbasliklari"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')"><?php echo $row_haberler['baslik']; ?>[/url]</td>
            </tr>
            <?php } while ($row_haberler = mysql_fetch_assoc($haberler)); ?>
          </table>
        </marquee>
      </form>
    </div>
    <div id="mesajyaz_bolumu">
      <form id="form2" name="form2" method="post" action="">
        <p>
          <label for="msjyaz"></label>
          <textarea name="msjyaz" cols="65" rows="8" class="msjyazimi" id="msjyaz">           
                  Giriş yaparak, siz de  duvara yazabilirsiniz.</textarea>
          <input name="msjgonder" type="reset" class="butonmsjyaz" id="msjgonder" value="D U V A R A   Y A Z I   G Ö N D E R" />
        </p>
      </form>
    </div>
    <div id="mesajlist_bolumu">
      <form id="form3" name="form3" method="post" action="">
        <table width="380" border="0" cellpadding="0" cellspacing="0">
          <?php do { ?>
          <tr>
            <td><p class="ml_user"><a href="#"><?php echo $row_msjlist['username']; ?>[/url]</p>
              <p class="ml_icerik"><?php echo $row_msjlist['mesaj']; ?></p>
              <p class="ml_tarih"><?php echo $row_msjlist['tarih']; ?></p></td>
          </tr>
          <?php } while ($row_msjlist = mysql_fetch_assoc($msjlist)); ?>
        </table>
      </form>
    </div>
  </div>
  <div id="ortabolge">
    <div id="ortaust_bolum">
      <div id="ortaust_solbolum">
        <div id="loginbolumu">
          <div id="asilloginbolumu">
            <form id="form6" name="form6" method="POST" action="<?php echo $editFormAction; ?>">
              <table width="400" border="0">
                <tr>
                  <td height="35" colspan="2" align="center" valign="middle">www.okuldaneve.com'a hoşgeldiniz</td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right" valign="middle" class="mmmmmmenu">Kullanıcı adı:</td>
                  <td width="300" height="30" align="left" valign="middle" class="mmmmmmenu"><label for="username"></label>
                  <input name="username" type="text" id="username" size="25" maxlength="20" value="<?php if (isset($_COOKIE["giris"]))
{
echo $_COOKIE["giris"];
} ?>"
/>
                  (3-20 karakter)</td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right" valign="middle" class="mmmmmmenu">Şifre:</td>
                  <td width="300" height="30" align="left" valign="middle" class="mmmmmmenu" onfocus="MM_validateForm('username','','R','password','','R');return document.MM_returnValue"><label for="password"></label>
                  <input name="password" type="password" id="password" size="26" maxlength="10" value="<?php if(isset($_COOKIE["sifre"]))
{
echo $_POST["sifre"];
}?>"
/>
                  (5-10 karakter)</td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right" valign="middle"><span class="mmmmmmenu">
                    <input name="hatirla" type="checkbox" id="hatirla" value="1" checked="checked" />
                    <label for="hatirla"></label>
Beni Hatırla </span></td>
                  <td width="300" height="30" align="left" valign="middle" class="mmmmmmenu"><input type="submit" name="giris" id="giris" value=" G İ R İ Ş  " />
                    &nbsp; &nbsp;
                    <input name="gizli_tarih" type="hidden" id="gizli_tarih" value="<?php echo date("Y-m-j"); ?>" />
                    <input name="gizli_saat" type="hidden" id="gizli_saat" value="<?php date_default_timezone_set('Europe/Istanbul'); echo date("H:i:s"); ?>" />
                    <input name="gizli_IPgiris" type="hidden" id="gizli_IPgiris" value="<?php @$kimlik = GetIP(); echo $kimlik; ?>" />
                    <input name="gizli_yedek" type="hidden" id="gizli_yedek" value="<?php echo date("Y-m-j H:i:s"); ?>" /></td>
                </tr>
              </table>
              <input type="hidden" name="MM_update" value="form6" />
            </form>
          </div>
          <div id="anasayfamyapbolumu">
            <table width="400" border="0">
              <tr>
                <td width="200" align="center"><div class="fb-like" data-href="http://www.okuldaneve.com" data-send="false" data-layout="box_count" data-width="200" data-show-faces="false"></div></td>
                <td width="200" align="center"><a href="javascript:history.go(0)" _fcksavedurl="javascript:history.go(0)" target="_self" onclick_fckprotectedatt=" onclick="javascript:this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.okuldaneve.com');"">Anasayfa Yap[/url]</td>
              </tr>
            </table>
          </div>
        </div>
        <div id="menubolumu">
          <table width="400" border="0">
            <tr align="center" valign="middle" class="menumenu">
              <td width="100" height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">MAKALELER[/url]</td>
              <td width="100" height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">Ö.Y.S.[/url]</td>
              <td width="100" height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">MÜZİK[/url]</td>
              <td width="100" height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">FOTOGALERİ[/url]</td>
            </tr>
            <tr align="center" valign="top" class="menumenu">
              <td height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">İLETİŞİM[/url]</td>
              <td height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">WEBCAM[/url]</td>
              <td height="25"><a href="#" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')">EDİTÖR[/url]</td>
              <td height="25">ÇIKIŞ</td>
            </tr>
          </table>
        </div>
      </div>
      <div id="logobolumu">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="250" id="FlashID" title="okuldan eve">
          <param name="movie" value="img/okuldanevelogo.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <!-- Bu param etiketi, Flash Player 6.0 r65 ve üzerini kullanan kullanıclardan Flash Player'ın en son sürümünü indirmesini ister. Kullanıcıların istemi görmesini istemiyorsanız bu etiketi silin. -->
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- Sonraki nesne etiketi IE tarayıcısı dışındaki tarayıcılara yöneliktir. Bu nedenle IECC'yi kullanarak bu etiketi IE'de gizleyin. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="img/okuldanevelogo.swf" width="200" height="250">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- Tarayıcı, Flash Player 6.0 ve daha eskisini kullanan kullanıcılar için aşağıdaki alternatif içeriği görüntüler. -->
            <div>
              <h4>Bu sayfadaki içerik, Adobe Flash Player'ın daha yeni bir sürümünü gerektiriyor.</h4>
              <p><img src="[url=http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif]http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Adobe Flash player Edinin" />[/url]</p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
      </div>
      <div id="derslerbolumu">
        <div id="derslerbaslikbolgesi"> D E R S L E R&nbsp; -&nbsp; L E S S O N S</div>
        <div id="derslericerikbolgesi">
          <form id="form4" name="form4" method="post" action="">
            <table width="580" border="0" cellpadding="0" cellspacing="0">
              <?php do { ?>
              <tr>
                <td><p><span class="dersno"><?php echo $row_dersler['no']; ?></span>-<span class="ders_basligi" onclick="MM_openBrWindow('popupwin.php','','width=200,height=100')"><a href="#"><?php echo $row_dersler['baslik']; ?>[/url]</span></p>
                  <p class="ders_icerigi"><?php echo $row_dersler['icerik']; ?></p>
                  <p class="derstarihi"><?php echo $row_dersler['tarih']; ?></p></td>
              </tr>
              <?php } while ($row_dersler = mysql_fetch_assoc($dersler)); ?>
            </table>
          </form>
        </div>
      </div>
      <div id="extrabolum">
        <div id="anketbolumu"><iframe src="anket.php" height="175" width="180" scrolling="no"></iframe></div>
        <div id="kamerabolumu"><iframe src="izle.php" height="175" width="250" scrolling="auto" frameborder="0"></iframe>         </div>
        <div id="ziyaretcibilgi_bolumu">
          <p class="ziyaretcibilgisibaslik">          IP numaranız</p>
          <p class="digerzbilgileri">
            <?php
$kimlik = GetIP();
echo $kimlik;
?>
          </p>
<p class="ziyaretcibilgisibaslik"> Ziyaretçi bilgisi</p>
<p class="digerzbilgileri">
  <?php
@$file="count.txt";
@$data_oggi=date("d/m/Y");
// Prima volta in assoluto che si accede alla pagina
if (!(file_exists($file)))
{
@$crea_file=fopen($file,"w");
@$inizio="1". $data_oggi. "1";
fputs($crea_file,$inizio);
fclose($crea_file);
}
else{
// Estrazione dati
@$dati=file($file);
@$visite_tot=$dati[0];
@$data=chop($dati[1]);
@$visite_oggi=$dati[2];
@$visite_tot=$visite_tot[1];
// Controllo delle visite odierne
if ($data_oggi==$data)
{ $visite_oggi=$visite_oggi['1']; }
else
{ $visite_oggi=1; }
// Scrittura dati su file
@$scrivi_file=fopen($file,"w ");
@$dati=$visite_tot."\n".$data_oggi."\n".$visite_oggi;
fputs($scrivi_file,$dati);
fclose($scrivi_file);
// Visualizzazione dati
@$tabella .="Bugun : $visite_oggi
";
@$tabella .="Toplam: $visite_tot";
echo $tabella;
}
?>
</p>
        </div>
      </div>
    </div>
  </div>
    <div id="reklambolgesi">
      <form id="form5" name="form5" method="post" action="">
        <table width="150" border="0" cellpadding="0" cellspacing="0">
          <?php do { ?>
            <tr>
              <td><?php echo $row_reklam['fashicerik']; ?></td>
            </tr>
            <?php } while ($row_reklam = mysql_fetch_assoc($reklam)); ?>
        </table>
      </form>
    </div>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php
mysql_free_result($haberler);
mysql_free_result($msjlist);
mysql_free_result($dersler);
mysql_free_result($reklam);
?>