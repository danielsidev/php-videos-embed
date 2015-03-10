<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
$PATH_APP = explode("view", str_replace("\\", "/", dirname(__DIR__)));  
require_once $PATH_APP[0] ."/controller/VideosController.php"; 
  /**
  @For Test
  @YouTube: https://www.youtube.com/watch?v=JRj_vEpaTPg  
  @Vimeo:   http://vimeo.com/channels/staffpicks/102000597
  **/
  if(isset($_POST)){      
      $url    = $_POST["url"];
      $width  = $_POST["largura"];
      $height = $_POST["altura"];

      $video = new VideosController($url, $width, $height);
      
      if (strpos($url, 'youtube') !== false){
        $video->retornaYouTube($url, $width, $height);
      }else if(strpos($url, 'vimeo') !== false){
        $video->retornaVimeo($url, $width, $height);        
      }else{
        echo "Só aceitamos URl's do You Tube e Vimeo!";
      }      
  }
  

