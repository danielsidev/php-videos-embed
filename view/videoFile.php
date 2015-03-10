<?php  
  ini_set('post_max_size', '100M');
  ini_set('upload_max_filesize', '100M'); 
  set_time_limit(0);
  
  $PATH_APP = explode("view", str_replace("\\", "/", dirname(__DIR__)));  
  require_once  $PATH_APP[0]."controller/VideosController.php";
 
  $video = $_FILES["urlvideo"];
  $dirVideo = date("YmdHis");  
  /** @Folder_Video: Diretório do vídeo tem nome construido da seguinte forma: Ano + Mês + Dia + Hora + Minuto **/
  
  $pathname =$PATH_APP[0]."/videos/".$dirVideo;
  $dirImovel =$pathname;
  $mask = umask(0);
  mkdir($pathname, 0777, true);
           
  $vi = new VideosController();
  $retorno = $vi->uploadVideo($video, $pathname);
  $dados["url_video"]=$retorno;  
              
  $fileName = $_FILES["url_video"]["name"];				
  $ret[]=   $pathname."/".$fileName;
      
  echo json_encode($ret);
  
  