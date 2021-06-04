<?php
$postXml = $GLOBALS["HTTP_RAW_POST_DATA"]; //接收微信参数 
// $postXml = file_get_contents("php://input");
// 接受不到参数可以使用file_get_contents("php://input"); PHP高版本中$GLOBALS好像已经被废弃了
if (empty($postXml)) {
  return false;
}
  
//将xml格式转换成数组
function xmlToArray($xml) {
  //禁止引用外部xml实体 
  libxml_disable_entity_loader(true);
  $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
  $val = json_decode(json_encode($xmlstring), true);
  return $val;
}
 
$attr = xmlToArray($postXml);
$total_fee = $attr['total_fee'];
$open_id = $attr['openid'];
$out_trade_no = $attr['out_trade_no'];
$time = $attr['time_end'];
 // print_r($attr);
?>