<?php 
ini_set('upload_max_filesize', '100M'); 
ini_set('post_max_size', '100M');
set_time_limit(0);
class UploadVideos{
	private $arquivo;
	private $caminho;

	function __construct($arquivo, $caminho){

		$this->arquivo = $arquivo;
	    $this->caminho = $caminho;

	}
    
    
    public function removeAcentos($string, $slug = false) {
	$string = strtolower($string);
    $string = str_replace(",", "", $string);
	$ascii['a'] = range(224, 230);
	$ascii['e'] = range(232, 235);
	$ascii['i'] = range(236, 239);
	$ascii['o'] = array_merge(range(242, 246), array(240, 248));
	$ascii['u'] = range(249, 252);
	$ascii['b'] = array(223);
	$ascii['c'] = array(231);
	$ascii['d'] = array(208);
	$ascii['n'] = array(241);
	$ascii['y'] = array(253, 255);
        foreach ($ascii as $key=>$item) {
            $acentos = '';
            foreach ($item AS $codigo) $acentos .= chr($codigo);
            $troca[$key] = '/['.$acentos.']/i';
        }
	$string = preg_replace(array_values($troca), array_keys($troca), $string);
        if ($slug) {
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
            $string = trim($string, $slug);
        }
	return $string;
}

    public function subirArquivo(){
        $allowedExts = array("avi","ogg", "mp4", "WebM");
        $extension = pathinfo($this->arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = removeAcentos($this->arquivo['name'],  false);//retira os sinais de acentuação
        move_uploaded_file($this->arquivo["tmp_name"],$this->caminho."/".$nomeArquivo);
        return $this->caminho."/".$nomeArquivo;         
        
    }

}
	?>