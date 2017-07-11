<?php
$this->layout = 'error';
$errorNum = 'ERROR 509';
$errorTitle = 'Límite de ancho de banda excedido';
$errorDescrip = 'Este código de estatus, a pesar de ser utilizado por muchos servidores, no es oficial.';
?>
<div class="overlay"></div>
<section id="page">
    <div class="row">
        <div class="col-md-12">
            <div class="divide-100"></div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-12 not-found">
                <div class="error"><h1><?=$errorNum;?></h1></div>
            </div>
            <div class="col-md-5 not-found">
                <div class="content">
                    <h1><?=$errorTitle;?></h1>
                    <p> <?=$errorDescrip;?><br />
                        Intente comprobar la URL de error.<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>