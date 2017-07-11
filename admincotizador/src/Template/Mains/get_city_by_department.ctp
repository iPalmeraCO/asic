<select id="city_id" name="city_id" class="col-md-12">
    <?php foreach($lista as $value){ ?>
    <option value="<?=$value['id']?>" <?php if ($id==$value['id']){echo 'SELECTED';} ?>><?=$value['name']?></option>
    <?php } ?>
</select>
