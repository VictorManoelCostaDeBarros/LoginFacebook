<?php 
    session_start();

    include('facebook-php-sdk/autoload.php');
    use Facebook\Facebook;
    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\Exceptions\FacebookSDKException;

    $appId = '1310466075824354';
    $appSecret = '2d9712a89f81fa86b294b7cd5e00f877';
    $redirectUrl = 'http://localhost/CursoDanki-Back-End/Projetos/Login-facebook/';
    $fbPermission = array('email');
    
    $fb = new Facebook(array(
        'app_id'=> $appId,
        'app_secret'=> $appSecret,
        'default_graph_version'=> 'v2.2'
    ));

    $helper = $fb->getRedirectLoginHelper();

    try{
        if(isset($_SESSION['facebook_access_token'])){
            $accessToken = $_SESSION['facebook_access_token'];
        }else{
            $accessToken = $helper->getAccessToken();
        }
    }catch(FacebookResponseException $e){}
?>