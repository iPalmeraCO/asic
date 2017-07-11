<style>
</style>
<?php
echo $this->Html->script('tableExport/tableExport.js');
echo $this->Html->script('tableExport/jquery.base64.js');
echo $this->Html->script('tableExport/jspdf/libs/sprintf.js');
echo $this->Html->script('tableExport/jspdf/jspdf.js');
echo $this->Html->script('tableExport/jspdf/libs/base64.js');
?>

<table id="cotizacion" width="100%" border="0">

    <thead>
        <tr>
            <th colspan="4">
    <center>
        <img src="http://asic.linktic.com/img/asic_logo.png"  />
        <br/>
        VISIÓN TIC DE NEGOCIO
    </center>
</th> 
</tr>


</thead>
<tbody>
    <tr>
        <td colspan="2" style="text-align: left;">
            <span style="color:#50ABE3;">
                Fecha: <?= date("Y-m-d"); ?>
            </span>
        </td> 
        <td colspan="2" style="text-align: right;">
            <span style="color:#50ABE3;">
                Cotizacion Num:  <?= $data['id'] ?>
            </span>
        </td> 
    </tr>
    <tr>
        <td colspan="4" style="padding: 20px;"><span style="color:#333333;">Descripción: Servicios de Nube de Infraestructura Computacional IAAS,


            </span></td> 
    </tr>
    <tr>
        <td colspan="4" style="padding: 20px;"><span style="color:#333333;">
<?php if (isset($data['customer']['company']['nit'])) { ?>Para <?= $data['customer']['company']['name'] ?><?php } ?>
                Solicitado (a) por <?= $data['customer']['name'] ?>  <?= $data['customer']['surname'] ?> Correo <?= $data['customer']['email'] ?>

            </span></td> 
    </tr>
    <tr>
        <td colspan="4" style="padding: 20px;"><span style="color:#333333;">
                COMPONENTES Y CARACTERISTICAS DEL SISTEMA SOLICITADO
            </span></td> 
    </tr>
    <tr >
        <td style="background-color: #ddd; border: 1px;"><span style="color:#50ABE3;">ELEMENTO</span></td> 
        <td style="background-color: #ddd; border: 1px;"><span style="color:#50ABE3;">DESCRIPCION</span></td> 
        <td style="background-color: #ddd; border: 1px;"><span style="color:#50ABE3;">CANTIDAD</span></td> 
        <td style="background-color: #ddd; border: 1px;"><span style="color:#50ABE3;">TOTAL</span></td> 
    </tr>
    <tr >
        <td style="border: 1px solid #000; padding: 5px;">
            <span style="color:#333333;">
                <?= $data['system']['name'] ?> 
            </span>
        </td> 
        <td style="border: 1px solid #000; padding: 5px;">
            <span style="color:#333333;">
                <?= $data['system']['description'] ?> 
            </span>
        </td> 
        <td style="border: 1px solid #000; padding: 5px;">
<center>
    <span style="color:#333333;">
        <?= $data['system']['quantity'] ?>
    </span>
</center>
</td> 
<td style="border: 1px solid #000; padding: 5px; text-align: center;">
    <span style="color:#333333;">
        $ <?= number_format($data['system']['total'], 2, '.', ',') ?>
    </span>
</td> 
</tr>
<tr border="1">
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['processor']['name'] ?>
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['processor']['description'] ?> 
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
<center>
    <span style="color:#333333;">
        <?= $data['processor']['quantity'] ?>
    </span>
</center>
</td> 
<td style="border: 1px solid #000; padding: 5px; text-align: center;">
    <span style="color:#333333;">
        $ <?= number_format($data['processor']['total'], 2, '.', ',') ?>    
    </span>
</td> 
</tr>
<tr border="1">
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['memory']['name'] ?>
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['memory']['description'] ?> 
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
<center>
    <span style="color:#333333;"><?= $data['memory']['quantity'] ?>
    </span>
</center>
</td> 
<td style="border: 1px solid #000; padding: 5px; text-align: center;">
    <span style="color:#333333;">
        $ <?= number_format($data['memory']['total'], 2, '.', ',') ?>
    </span>
</td> 
</tr>
<tr>
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['harddisk']['name'] ?>
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['harddisk']['description'] ?>
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px; ">
<center>
    <span style="color:#333333;">
        <?= $data['harddisk']['quantity'] ?>
    </span>
</center>
</td> 
<td style="border: 1px solid #000; padding: 5px; text-align: center;">
    <span style="color:#333333;">
        $ <?= number_format($data['harddisk']['total'], 2, '.', ',') ?>
    </span>
</td> 
</tr>
<tr >
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['connectivity']['name'] ?> 
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
        <span style="color:#333333;">
            <?= $data['connectivity']['description'] ?> 
        </span>
    </td> 
    <td style="border: 1px solid #000; padding: 5px;">
<center>
    <span style="color:#333333;">
        <?= $data['connectivity']['quantity'] ?>
    </span>
</center>
</td> 
<td style="border: 1px solid #000; padding: 5px; text-align: center">
    <span style="color:#333333;">
        $ <?= number_format($data['connectivity']['total'], 2, '.', ',') ?>
    </span>
</td> 
</tr>
<tr>
<tr>
    <td colspan="4" style="padding: 5px;">ADICIONALES</td>
</tr>
<?php foreach ($data['additionals'] as $additional) { ?>
    <tr>

        <td style="border: 1px solid #000;">
            <span style="color:#333333;">
                <?= $additional['name'] ?> 
            </span>
        </td> 
        <td style="border: 1px solid #000;">
            <span style="color:#333333;">
                <?= $additional['description'] ?> 
            </span>
        </td> 
        <td style="border: 1px solid #000; text-align: center;">

            <span style="color:#333333;">
                <?= $additional['quantity'] ?>
            </span>

        </td> 
        <td style="border: 1px solid #000; text-align: center;"> 
            <span style="color:#333333;">

                $ <?= number_format($additional['total'], 2, '.', ',') ?>
            </span>
        </td> 

    </tr>
<?php } ?>
<tr>
    <td colspan="3" style="border: 1px solid #000; text-align: center;">
        VALOR TOTAL
    </td>
 

    <td  style="border: 1px solid #000; text-align: center;">

        <h4 style="color:#50ABE3;">$ 
            <?= number_format($data['subtotal'], 2, '.', ',') ?>
        </h4>

    </td>
</tr>
</tbody>
</table>

<script>
    $(document).ready(function() {
        $('#cotizacion').tableExport({type: 'pdf', escape: 'false'});
    });
</script>