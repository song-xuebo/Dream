<?php
include 'WeixinPay.php';
$appid='wx6de70227f98c29a5'; //小程序appid
$openid= $_POST['id'];
$mch_id='1252484701'; //微信支付商户支付号
$key='oI9Ip4xlwhW47IYk3hBvlIqyWcx0'; //Api密钥
$out_trade_no = $mch_id. time();
$total_fee = $_POST['fee'];
if (empty($total_fee)) { //押金
  $body = "充值押金";
  $total_fee = floatval(99*100);
} else {
   $body = "充值余额";
   $total_fee = floatval($total_fee*100);
 }
$weixinpay = new WeixinPay($appid,$openid,$mch_id,$key,$out_trade_no,$body,$total_fee);
$return=$weixinpay->pay();
echo json_encode($return);
?>