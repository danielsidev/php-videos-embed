<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

setlocale(LC_ALL, 'ptb', 'portuguese-brazil', 'pt-br', 'bra', 'brazil');
date_default_timezone_set('America/Sao_Paulo');
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M'); 
set_time_limit(0);
$PATH_APP = explode("controller", str_replace("\\", "/", dirname(__DIR__)));

require_once $PATH_APP[0].'/model/VideosClass.php';

class VideosController {
  protected $url="";
  protected $width=null;
  protected $height=null;
  
  public function __construct($url,$width=null,$height=null) {
  $this->url   = $url;
  $this->width = $width;
  $this->height= $height;
  }
    
  public function retornaYouTube() {    	
  $video = new VideosEmbed($this->url,$this->width,$this->height);   	    	
  $embed = $video->getYouTube();
  return $embed;    	
  }
    
  public function retornaVimeo() {    	
  $video = new VideosEmbed($this->url,$this->width,$this->height);   	    	
  $embed = $video->getVimeo();
  return $embed;    	
  }
    
    
}

