<?php

$postStr = file_get_contents("php://input");

file_put_contents('msg.txt',$postStr);

$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//微信用户
$fromUsername = $postObj->FromUserName;
//给谁发
$toUsername = $postObj->ToUserName;
//关键字
$keyword = trim($postObj->Content);
//发送的时间
$time = time();

 // $textTpl = "<xml>
 //        <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
 //        <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
 //        <CreateTime>".$time."</CreateTime>
 //        <MsgType><![CDATA[text]]></MsgType>
 //        <Content>".$keyword."</Content>
 //        <FuncFlag>0</FuncFlag>
 //        </xml>";
//图片
 $textTpl = "<xml>
                <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
                <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
                <CreateTime>".$time."</CreateTime>
                <MsgType><![CDATA[image]]></MsgType>
                <Image><MediaId><![CDATA[efIqVjEM-0dBE3AkgQFfcsDmEquXMA3ffP8P1XabWIpeYJzuoz9I-W4amjOhI06H]]></MediaId></Image>
            </xml>";

//音频
//$textTpl = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".$time."</CreateTime><MsgType><![CDATA[voice]]></MsgType><Voice><MediaId><![CDATA[BTH0UExD5594L7hEdBcNrdurd6kmVk2AcpRC4BvShSsRtaNtOFUqEVbxnvvQCDlt]]></MediaId></Voice></xml>";

//视频
/*$textTpl = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".$time."</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[E2XxQeF6TA7tyNQ9c0JYg9bmvwD53S4DpZaavjnji58MkerlOWqafyZqKPqbNNJm]]></MediaId><Title><![CDATA[一间小木屋]]></Title><Description><![CDATA[黑暗料理]]></Description></Video></xml>";*/

//图文
// $textTpl = "<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".$time."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>1</ArticleCount><Articles><item><Title><![CDATA[缩略图的媒体id，通过素材管理中]]></Title><Description><![CDATA[图文消息个数；当用户发送文本、图片、视频、图文、地理位置这五种消息时，开发者只能回复1条图文消息；其余场景最多可回复8条图文消息]]></Description><PicUrl><![CDATA[http://www.wzwyuxi.cn/wechat/lamp212/image/360x200/1.jpg]]></PicUrl><Url><![CDATA[http://www.wzwyuxi.cn/1.html]]></Url></item></Articles></xml>";

echo $textTpl;

//https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE



?>