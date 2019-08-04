<?php 

function botonHtml ($btnText, $btnHref, $btnClass = '') {
	return '<a class="btn ' . $btnClass . '" href="' . $btnHref . '">' . $btnText .'</a>';
}

?>