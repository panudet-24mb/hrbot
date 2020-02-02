<?php

	
	/*Function SET Message Format*/
	function getFormatTextMessage($text)
	{
		$datas = [];
		$datas['type'] = 'text';
		$datas['text'] = $text;

		return $datas;
	}

	/*Function SET Sticker Format*/
	function getFormatStickerMessage($packageId,$stickerId)
	{
		$datas = [];
		$datas['type'] = 'sticker';
		$datas['packageId'] = $packageId;
		$datas['stickerId'] = $stickerId;

		return $datas;
	}

	/*Function SET Image Format*/
	function getFormatImageMessage($originalUrl,$previewImageUrl)
	{
		$datas = [];
		$datas['type'] = 'image';
		$datas['originalContentUrl'] = $originalUrl;
		$datas['previewImageUrl'] = $previewImageUrl;

		return $datas;
	}

	/*Function SET Video Format*/
	function getFormatVideoMessage($originalUrl,$previewImageUrl)
	{
		$datas = [];
		$datas['type'] = 'video';
		$datas['originalContentUrl'] = $originalUrl;
		$datas['previewImageUrl'] = $previewImageUrl;

		return $datas;
	}

	/*Function GET Token*/
	function getTokenData()
	{
		$token = "fVC3+psz/Eb5k07+lN0LKxP6nqsMVlE27xsPLU6ZRE/+nrdB/FkEy2w2tJVYQ8eYk49qwRi2p+0tGL4GNB/sNd451qR+AzTxY701A5nEm5yYGTs6LgN+kjPkYFPsaFwjZUPi+9CXKgzT12iKKg2WpgdB04t89/1O/w1cDnyilFU=";

		return $token;
	}

	/*Function GET Content*/
	function getContent($id)
	{
		$result = [];
		$token = getTokenData();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.line.me/v2/bot/message/".$id."/content",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer ".$token,
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
			$result['result'] = $response;
		  	define('UPLOAD_DIR', 'AiFace/tmp_image/');
		  	$img=base64_encode($response);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			 file_put_contents($file, $data);
			 return $file;
			

			
		}
	}

	