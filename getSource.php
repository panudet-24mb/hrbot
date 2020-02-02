<?php 
     function getSource($id){
    
    $headers = array('Content-Type: application/json', 'Authorization: Bearer fVC3+psz/Eb5k07+lN0LKxP6nqsMVlE27xsPLU6ZRE/+nrdB/FkEy2w2tJVYQ8eYk49qwRi2p+0tGL4GNB/sNd451qR+AzTxY701A5nEm5yYGTs6LgN+kjPkYFPsaFwjZUPi+9CXKgzT12iKKg2WpgdB04t89/1O/w1cDnyilFU= ');
    $ch = curl_init('https://api.line.me/v2/bot/profile/'.$id);
    curl_setopt($ch, CURL_CUSTOMREQUEST , "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    $profile_json = curl_exec($ch);
    $profile_array = json_decode($profile_json , true);
    print_r($profile_array);
    curl_close($ch);
    return $profile_array['userId'];

     }
?>
