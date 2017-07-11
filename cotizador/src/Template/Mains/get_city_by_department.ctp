
    <?php foreach($lista as $value){ ?>
    <option value="<?=$value['id']?>" <?php if ($id==$value['id']){echo 'SELECTED';} ?>><?=$value['name']?></option>
    <?php } ?>