<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
class VideosEmbed{
  
  protected $url="";
  protected $width=null;
  protected $height=null;
  protected $id=null;


  public function __construct($url,$width=null,$height=null) {
  $this->url   = $url;
  $this->width = $width;
  $this->height= $height;
  }

  public function getYouTube() {
  preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$this->url,$matches);	
  //the ID of the YouTube URL: x6qe_kVaBpg
  $this->id = $matches[1];
  //set a custom width and height
  $this->width = ($this->width == null) ? "640" : $this->width;
  $this->height= ($this->height== null) ? "360" : $this->height;
  
  echo '<div class="youtube-article"><iframe class="dt-youtube" '
      .'width="' .$this->width. '" height="'.$this->height.'" '
      .'src="//www.youtube.com/embed/'.$this->id.'" frameborder="0"'
      .'allowfullscreen></iframe></div>';        
  }
    
  public function getVimeo() {    
  $u = explode("/", $this->url); 
  $tam = count($u);
  $tam--;
  //The ID of the Vimeo URL: 71673549 //For Example
  $this->id = $u[$tam];
  //set a custom width and height
  $this->width = ($this->width == null) ? "640" : $this->width;
  $this->height= ($this->height== null) ? "360" : $this->height;	
  
  echo '<div class="vimeo-article"><iframe src="http://player.vimeo.com/video/'
    .$this->id.'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;'
    .'color=ffffff" width="'.$this->width.'" height="'.$this->height.'" frameborder="0" '
    .'webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';        
    }
    
}

