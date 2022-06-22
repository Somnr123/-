<?php
header("Content-Type: text/html; charset=UTF-8");
libxml_use_internal_errors(true);

$typeid =$_GET["t"];
$page = $_GET["pg"];
$ids = $_GET["ids"];

$web='http://1090ys2.com';

//===============================================影视分类相关配置开始===========================
//电影 连续剧 要加一个空格，否则无法显示
$movietype = '{"class":[{"type_id":1,"type_name":"电 影"},{"type_id":2,"type_name":"国产剧"},{"type_id":3,"type_name":"韩剧"},{"type_id":4,"type_name":"美剧"},{"type_id":5,"type_name":"日剧"},{"type_id":22,"type_name":"综艺"},{"type_id":26,"type_name":"国漫"},{"type_id":25,"type_name":"日漫"}]}';
//===============================================影视分类相关配置结束===========================




//===============================================影视列表相关配置开始===========================
//取出影片的链接 默认引用xpath列表规则  
$linkAttr='href';

//取出影片ID的文本左边 从$linkAttr取值  /show/78197.html  影视ID78197前面的文本是/show/
$url1='/show/';

//取出影片ID的文本右边 从$linkAttr取值 /show/78197.html 影视ID78197后面的文本是.html
$url2='.html';

//xpath列表
$query='//div[@class="stui-vodlist__box"]/a';

//取出影片的图片
$picAttr='//div[@class="stui-vodlist__box"]/a/@data-original';

//取出影片的标题 默认引用xpath列表规则
$titleAttr='title';

//影视更新情况 例如：更新至*集
$query2 = '//div[@class="stui-vodlist__box"]/a/span[@class="pic-text text-right"]';

//影视列表链接 pageid=页码  typeid=类目ID
$liebiao='http://1090ys2.com/whole/typeid/page/pageid.html';

//每页多少个影片
$num=30;
//===============================================影视列表相关配置结束===========================







//===============================================影视详情相关配置开始===========================
//影片链接 vodid=影片ID  
$detail='http://1090ys2.com/show/vodid.html';

//影片名称
$vodtitle='//div[@class="stui-content__detail"]/h1';

//影片类型 /html/body/div[3]/div/div[2]/div[1]/div/div/div/div[2]/p[3]/text()[1]
$vodtype='/html/body/div[3]/div/div[2]/div[1]/div/div/div/div[2]/p[3]/text()[1]';

//播放地址名称 /html/body/div[3]/div/div[2]/div[2]/div/div[1]/div/h3
$playname='//div[@class="stui-pannel__head bottom-line active clearfix"]/h3';

//播放地址
$playurl='//div[@class="stui-pannel_bd col-pd clearfix"]';

//取出影片的全部播放链接  注意这里的数字在下面$i2= $i+1;引用  $i是从0开始 具体情况具体分析
//  /html/body/div[3]/div/div[2]/div[2]/div/div[2]/ul/li/a  /html/body/div[3]/div/div[2]/div[3]/div/div[2]/ul/li/a
$linkAttr2='//html/body/div[3]/div/div[2]/div[数字]/div/div[2]/ul/li/a';

//取出影片图片
$vodimg='//a[@class="stui-vodlist__thumb picture v-thumb"]/img/@data-original';

//取出影片简介
$vodtext='//span[@class="detail-sketch"]';

//取出影片年份
$vodyear='/html/body/div[3]/div/div[2]/div[1]/div/div/div/div[2]/h1';

//===============================================影视详情相关配置结束===========================






if ($typeid<> null && $page<>null){
$liebiao=str_replace("typeid",$typeid,$liebiao);
$liebiao=str_replace("pageid",$page,$liebiao);
//读取影视列表
$html = curl_get($liebiao);
$dom = new DOMDocument();
$dom->loadHTML($html);
$dom->normalize();
$xpath = new DOMXPath($dom);
$texts = $xpath->query($query2);
$events = $xpath->query($query);
$picevents = $xpath->query($picAttr);

$length=$events->length;
if ($length<$num)
{
$page2=$page;
}else{
$length=$length+1;
$page2=$page + 1;
}
$result='{"code":1,"page":'.$page.',"pagecount":'. $page2 .',"total":'. $length.',"list":[';
for ($i = 0; $i < $events->length; $i++) {
    $event = $events->item($i);
    $text = $texts->item($i)->nodeValue;
    $link = $event->getAttribute($linkAttr);
    $title = $event->getAttribute($titleAttr);
    $pic = $picevents->item($i)->nodeValue;
    
    if($url1<>null){
      $link2 =getSubstr($link,$url1,$url2);  
    }else{
    $link2 =$link;
    }


	if (substr($pic,0,4)<>'http'){
	$pic = $web.$pic;
	}

    $result=$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_pic":"'.$pic.'","type_id":'.$typeid.',"vod_remarks":"'.$text.'"},';
}

$result=substr($result, 0, strlen($result)-1).']}';
echo $result;
}else if ($ids<> null){
$detail=str_replace("vodid",$ids,$detail);
$html = curl_get($detail);
$dom = new DOMDocument();
$dom->loadHTML($html);
$dom->normalize();
$xpath = new DOMXPath($dom);
$texts = $xpath->query($vodtitle);
$text = $texts->item(0)->nodeValue;
$texts = $xpath->query($vodtype);
$type = $texts->item(0)->nodeValue;
$texts = $xpath->query($vodtext);
$vodtext2 = $texts->item(0)->nodeValue;
$texts = $xpath->query($vodyear);
$year = $texts->item(0)->nodeValue;
$texts = $xpath->query($vodimg);
$img = $texts->item(0)->nodeValue;
	if (substr($img,0,4)<>'http'){
	$img = $web.$img;
	}

$result='{"list":[{"vod_id":"'.$ids.'",';

$result=$result.'"vod_name":"'.$text.'",';

$result=$result.'"vod_pic":"'.$img.'",';

$result=$result.'"type_name":"'.$type.'",';

$result=$result.'"vod_year":"'.$year.'",';

$result=$result.'"vod_content":"'.$vodtext2.'",';

$yuan = '';
$dizhi = '';

$text1 = $xpath->query($playname);
$text2 = $xpath->query($playurl);
for ($i = 0; $i < $text2->length; $i++) {
    $event2 = $text2->item($i);
    $event1 = $text1->item($i);
    $bfyuan = $event1->nodeValue;

$yuan = $yuan.$bfyuan.'$$$';

// //*[@id="vlink_1"]/ul/li/a  //*[@id="vlink_2"]/ul/li/a
//两个列表取出来比较发现vlink_1和 vlink_2是递增，$i是从0开始。所以第一次就是0+1  第二次就是1+1=2
$i2= $i+2;

$linkAttr3=str_replace("数字",$i2,$linkAttr2);

$link = $xpath->query($linkAttr3);

$dizhi2 = '';
for ($z = 0; $z < $link->length; $z++) {
    $text3 = $link->item($z);
    $text4 = $text3->nodeValue;
    $link4 = $text3->getAttribute($linkAttr);

	if (substr($link4,0,4)<>'http'){
	$link4 = $web.$link4;
	}
$dizhi2 = $dizhi2.$text4.'$'.$link4.'#';
}
$dizhi=$dizhi.substr($dizhi2, 0, strlen($dizhi2)-1).'$$$';
}

$result= $result.'"vod_play_from":"'.substr($yuan, 0, strlen($yuan)-3).'",';
$result= $result.'"vod_play_url":"'.substr($dizhi, 0, strlen($dizhi)-3).'"}]}';

echo $result;

}else{
echo $movietype;
}




function curl_get($url){
   $header = array(
       'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $data = curl_exec($curl);
    if (curl_error($curl)) {
        return "Error: ".curl_error($curl);
    } else {
	curl_close($curl);
	return $data;
    }
}

function getSubstr($str, $leftStr, $rightStr) 
{
$left = strpos($str, $leftStr);
$right = strpos($str, $rightStr,$left);
if($left < 0 or $right < $left){
return '';
}
return substr($str, $left + strlen($leftStr),$right-$left-strlen($leftStr));

} 
?>
