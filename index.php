<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vídeos</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        
        <script type="text/javascript">
        $(document).ready(function(){
        $('#visualizar-video').click(function(){

        var video = $("#url_video").val();
        $("#tituloVisualVideo").css("display","block");
         $("#visualizarVideo").html("<img src='img/loading-novo.gif' /> Carregando Vídeo...");
         
         console.log("URL: "+video)
        if(video!=""){
            video =String(video);//.toString();
        var dados ="url="+video+"&largura=400&altura=200";
            
            $.ajax({
            type: "POST",
            dataType: "HTML",
            url: "view/index.php",
            data: dados,
              success: function(data){
              $("#visualizarVideo").html(data);  
             },
              error: function() {
              alert("Not OKay");
             }
           })
        
        }else{
            $("#visualizarVideo").html("<hr/><span style='color:#ff0000;'>Informe a URL do vídeo!</span>");
        } 
    });
    
  });
        
        </script>
        
        <style type="text/css">
            body{ font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;}
            .btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  background: #013a06;
  color: #fff;
  cursor: pointer;
}

.btn:hover{
  background: #017c3d;
  color: #fff;
}

input[type="text"]{
    width: 80% !important;
    height: 30px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-shadow: 0px 0px 10px #ccc;
    padding: 5px;
    outline-color: #017c3d;
}
input[type="text"]:focus{box-shadow: 0px 0px 10px #017c3d;}
        </style>
    </head>
    <body>
     <div style="position:relative;" id="tipoVideoContainer">
   URL's aceitas: <img title="You Tube" alt="You Tube" src="img/icon-youtube.png"> | <img src="img/icon-vimeo.png" title="Vimeo" alt="Vimeo">
   <br> <br> 
   <label for="video">Incluir URL de Vídeo da Web</label><br><br/>
   <input type="text"  class="form-control" name="url_video" id="url_video"> <br/><br/>
   <input type="button" id="visualizar-video" class="form-control btn btn-danger" value="Visualizar">
</div>
        <br/>
        <div id="tituloVisualVideo" style="display: block;">Visualizando prévia do vídeo:</div>
        <div id="visualizarVideo"></div>
    </body>
</html>
