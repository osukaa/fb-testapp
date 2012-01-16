<?php
// Aqui colocamos el ID de nuestra aplicaci�n en Facebook que lo obtenemos en la secci�n de "Facebook Integration" 
de nuestra aplicaci�n
$app_id = "YOUR_APP_ID";
// Aqui colocamos el canvas(URL) de nuestras aplicaci�n en Facebook
// en mi ejemplo seria http://apps.facebook.com/psychoblogapp/
$canvas_page = "YOUR_CANVAS_PAGE_URL";

// URL para que el usuario instale nuestra aplicacin en su perfil
$auth_url = 'http://www.facebook.com/dialog/oauth?client_id='
    . $app_id . '&redirect_uri=' . urlencode( $canvas_page );
 
$signed_request = $_REQUEST['signed_request'];
 
list($encoded_sig, $payload) = explode('.', $signed_request, 2);
 
$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
 
// Preguntar si obtenemos el id del usuario
if ( empty ( $data['user_id'] ) )
{
   // Redireccion al dialogo de instalaci�n
    echo( '<script type="text/javascript"></script>"' );
}
else
{
    echo ( 'Hola claber, tu ID en Facebook es: ' . $data['user_id'] );
}
?>