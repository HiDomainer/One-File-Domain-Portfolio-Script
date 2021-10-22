<?php
$Password='123456';
$CurrencySymbol='$';
/* -------------------------------------------------------------------
ScriptName: HiDomainer | One-File Domain Portfolio Script
AUTHOR: HiDomainer.com

HOMEPAGE: https://www.hidomainer.com/
DEMO: https://demo.hidomainer.com/1/
GITHUB: https://github.com/HiDomainer/One-File-Domain-Portfolio-Script
----------------------------------------------------------------------*/
$dataFile='data.json';
if(isset($_POST['password'])){
	if($_POST['password']!=$Password) {
	$return='"Failed","Password Error"';
	}else{
	unset($_POST['password']);	
	$return='"Failed","Please modify the file permission of data.json to 777"';
	if(file_put_contents($dataFile,json_encode($_POST))){$return='"Success","Data updated successfully"';}
	}
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript" type="text/javascript">window.top.window.showAlert('.$return.');</script>'; 
	exit;
}
$config=json_decode(file_get_contents($dataFile),true);
if($_GET['admin']){
echo '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
</head>
<body>
<style>
body{font-size:14px; padding:30px 0px;}
.header{max-width: 80%; margin: 0 auto;}
.header p{ margin-bottom:0px;}
.textarea{border:0;border-radius:5px;background-color:rgba(241,241,241,.98);width:100%;padding: 10px;resize: none;}
.center{text-align:center;}
.save { 
    padding: 10px 20px;  
	font-size:18px;
	border-width: 0px; 
	border-radius: 3px;
	background: #3475f5; 
	cursor: pointer;
	outline: none; 
	color: white;
}
.password{
	padding: 10px 10px;  
	font-size:18px;
	margin-right:20px;
	}
p a{ color:#000;}	
.model {
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.2);
	z-index: 999;
}
.model_popup {
	width: 452px;
	background-color: #FFFFFF;
	border-radius: 8px;
	text-align: center;
	padding-bottom: 20px;
	position: absolute;
	top: 50%; 
	left: 50%;
	margin-left: -226px;
	margin-top: -140px;
	overflow: hidden;
}
.model_popup .popup-title {
    height: 45px;
    text-align: center;
    line-height: 45px;
    font-size: 16px;
    color: #333333;
    font-size: 16px;
    color: #333333;
}
.model_popup .popup-text {
    padding: 25px 40px 35px;
    text-align: center;
    font-size: 16px;
    color: #333333;
	/* border-bottom: 1px solid #f2f2f2; */
	border-top: 1px solid #99bafa;
}
.popup-btn {
	overflow: hidden;
}
.popup-btn .sure{
    display: inline-block;
    width: 100px;
    height: 34px;
    line-height: 34px;
    background-color: #3475f5;
    cursor: pointer;
    font-size: 14px;
    color: #fff;
    border-radius: 4px;
    border: 1px solid transparent;
	margin-right: 40px;
}
.popup-btn .alert_sure {
	margin: 0;
}
</style>
<script>
function Popup () {
	var that = this;
	this.alert = function (title,text) {
		var model = document.getElementById(\'model\');
		if (model) {
			var atitle = document.getElementById(\'alerttitle\');
			atitle.innerText = title;
			var acontent = document.getElementById(\'alertContent\');
			acontent.innerText = text;
			model.style.display = \'block\';
			return
		}
		var creatediv = document.createElement(\'div\');
		creatediv.className = \'model\';  
		creatediv.setAttribute(\'id\',\'model\');
		var contentHtml = \'<div class="model_popup" style="">\'
				+\'<div class="popup-title" id="alerttitle">\'+title+\'</div>\'
				+\'<div class="popup-text" id="alertContent">\'+text+\'</div>\'
				+\'<div class="popup-btn">\'
				+\'	<span class="sure alert_sure" id="sure-popup">Close</span>\'
				+\'</div>\'
			+\'</div>\'
		creatediv.innerHTML = contentHtml;
		document.body.appendChild(creatediv);
		document.getElementById(\'sure-popup\').addEventListener(\'click\',function(){
			that.sureAlert();
		})
	},
	this.sureAlert = function () {
		var model = document.getElementById(\'model\');
		model.style.display = \'none\'
	}
}
var Popup = new Popup();
function showAlert(result,text){Popup.alert(result,text);}
</script>
<div class="header">
<iframe id="manager_target" name="manager_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<form method="post" target="manager_target">
<h2 class="center">Admin Panel</h2>
<p>SEO Title</p>
<textarea name="seo-title" class="textarea" style="height: 1.2em;">'.$config['seo-title'].'</textarea>
<p>SEO Keywords</p>
<textarea name="seo-keywords" class="textarea" style="height: 2.2em;">'.$config['seo-keywords'].'</textarea>
<p>SEO Description</p>
<textarea name="seo-description" class="textarea" style="height: 3.2em;">'.$config['seo-description'].'</textarea>
<p>Header Line 1</p>
<textarea name="line1" class="textarea" style="height: 1.2em;">'.$config['line1'].'</textarea>
<p>Header Line 2</p>
<textarea name="line2" class="textarea" style="height: 2.2em;">'.$config['line2'].'</textarea>
<p>Domains Data</p>
<textarea name="domains" class="textarea" style="height: 20.2em;">'.$config['domains'].'</textarea>
<p>Footer</p>
<textarea name="footer" class="textarea" style="height: 1.2em;">'.$config['footer'].'</textarea>
<p>Site Statistics Code</p>
<textarea name="code" class="textarea" style="height: 2.2em;">'.$config['code'].'</textarea>
<p class="center"><input name="password" type="text" autocomplete="off"  size="16" placeholder="Password" class="password"/><input type="submit" value="Save" class="save"></p>
<p class="center"><a href="http://www.hidomainer.com/?f=1">Powered by HiDomainer.com</a></p>
</div>
</body>
</html>';
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$config['seo-title']?></title>
<meta name="keywords" content="<?=$config['seo-keywords']?>">
<meta name="description" content="<?=$config['seo-description']?>">
<!-- 
ScriptName: HiDomainer | One-File Domain Portfolio Script
AUTHOR: HiDomainer.com

HOMEPAGE: https://www.hidomainer.com/
DEMO: https://demo.hidomainer.com/1/
GITHUB: https://github.com/HiDomainer/One-File-Domain-Portfolio-Script
-->
<style type="text/css">
body {font-family: arial;background:#fff;}
table {
    border: 1px solid #ccc;
    width: 80%;
    margin:0;
    padding:0;
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0 auto;
  }
table a{color:#000; text-decoration:none;} 
table tr {
    border: 1px solid #ddd;
    padding: 5px;
  }
table th, table td {
    padding: 10px;
    text-align: left;
  }
table th {
    font-size: 14px;
    letter-spacing: 1px;
  }
@media screen and (max-width: 600px) {
    table {
      border: 0;
    }
    table thead {
      display: none;
    }
    table tr {
      margin-bottom: 10px;
      display: block;
      border-bottom: 2px solid #ddd;
    }
    table td {
      display: block;
      text-align: right;
      font-size: 13px;
      border-bottom: 1px dotted #ccc;
    }
    table td:last-child {
      border-bottom: 0;
    }
    table td:before {
      content: attr(data-label);
      float: left;
      font-weight: bold;
    }
  }
.header,.footer{max-width: 80%; margin: 0 auto; }
.center{ 
  /* text-align:center; */ 
}
.footer{padding:2em 0;}
.footer a{color:#000;}
.buynow { 
text-decoration:none;  
background-color: #449d44;
border-color: #398439; 
color:#fff;  
padding: 5px 15px 5px 15px;  
font-weight:bold;  
border-radius:3px;  
-webkit-transition:all linear 0.30s;  
-moz-transition:all linear 0.30s;  
transition:all linear 0.30s;  
}
</style>
</head>
<body>
<div class="header">
<h1 class="center"><?=$config['line1']?></h1>
<p  class="center"><?=$config['line2']?></p>
</div>
<table>
  <thead>
    <tr><th>Domain</th><th>Price</th><th>Introduction</th><th>BuyLink</th></tr>
  </thead>
  <tbody>
<?php
$domains=explode("\n",trim($config['domains']));
if(!empty($domains)){
 foreach($domains as $l){
	$d=explode('|',trim($l));
    $d=array_map("trim",$d);
	$d[3]=str_replace('{domain}',strtolower($d[0]),$d[3]);
	echo $d[0]!=''?'<tr>
      <td data-label="Domain">'.$d[0].'</td>
      <td data-label="Price">'.($d[1]>0?$CurrencySymbol.number_format($d[1]):'-').'</td>
      <td data-label="Introduction">'.$d[2].'</td>
      <td data-label="BuyLink" class="buylink">'.($d[3]!=''?'<a href="'.$d[3].'" class="buynow" target="_blank">Buy</a>':'-').'</td>
    </tr>':'';
		}
}
?>  
  </tbody>
</table>
<div class="footer center"><?=$config['footer']?> | <a href="http://www.hidomainer.com/?f=1">Powered by HiDomainer</a></div>
<div style="display:none"><?=$config['code']?></div>
</body>
</html>