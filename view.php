<?php
   $path = "admin/";
   $diretorio = dir($path);
    
    echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";    
   while($arquivo = $diretorio -> read()){
      echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
   }
   $diretorio -> close();
?>

Leia mais em: Listando arquivos de pastas com PHP http://www.devmedia.com.br/listando-arquivos-de-pastas-com-php/17716#ixzz2rn5axL7p