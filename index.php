<?php
/* COPY FREE
	PROGRAMED BY ARDAVAN
	GITHUB.COM/ARDAVANNAFEZI
	TWITTER: ARDAVAN_NAFEZI
*/
##-------------ARDAVAN-----------------##
define('API_KEY','#YOUR API KEY HERE#');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

//-//////
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$username= $message->chat->username;
$name= $message->chat->first_name;
$channel_post= $update->channel_post;
$type= $message->chat->type;
$msgidch = $update->channel_post->message_id;
$textch = $update->channel_post->text;
$img = new CURLFile(realpath("#"));
$chid = $update->channel_post->id;
$video = $update->message->video->file_id;
$voice = $update->message->voice->file_id;
$file = $update->message->document->file_id;
$music = $update->message->audio->file_id;
$ph = $update->message->photo;
$us = "0";

//===================FUNCTION==================================//
function SendMessage($ChatId, $TextMsg)
{
 bot('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>$Mtd
]);
}

function SendPhoto($chatid,$photo,$caption){
  bot('SendPhoto',[
  'chat_id'=>$chatid,
  'photo'=>$photo,
  'caption'=>$caption
  ]);
}
function SendAudio($chatid,$audio,$caption,$sazande){
    bot('SendAudio',[
        'chat_id'=>$chatid,
        'audio'=>$audio,
        'caption'=>$caption,
        'performer'=>$sazande
       
          ]);
}

function SendVoice($chatid,$voice,$caption){
  bot('SendVoice',[
  'chat_id'=>$chatid,
  'voice'=>$voice,
  'caption'=>$caption
  ]);
}
function SendVideo($chat_id, $video, $caption){
  bot('SendVideo',[
  'chat_id'=>$chat_id,
  'video'=>$video,
  'caption'=>$caption
  ]);
  }
 
$keyhome=json_encode([
	'keyboard'=>[
	[['text'=>"GET CODE"]],
	[['text'=>"help?"]]
	]
    ]);
   


/*bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"#",
        'reply_markup'=>$keyhome
        ]);
}
*/


?>


