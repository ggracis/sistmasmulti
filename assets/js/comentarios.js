function borrarComentario($idComentario) {
  $file = file_get_contents('comentarios.json');
  $data = json_decode($file);
  unset($file);

  
}
