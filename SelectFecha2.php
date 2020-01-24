<select class="btn btn-default dropdown-toggle" name="dia2">
        <?php
        
        for ($i=1; $i<=31; $i++) {
            if ($i == date('d'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }echo '<option value="--" selected>--</option>';
        ?>
</select>
<select class="btn btn-default dropdown-toggle" name="mes2">
        <?php
        for ($j=1; $j<=12; $j++) {
            if ($j == date('m'))
                echo '<option value="'.$j.'" selected>'.$j.'</option>';
            else
                echo '<option value="'.$j.'">'.$j.'</option>';
        }echo '<option value="--" selected>--</option>';
        ?>
</select>
<select class="btn btn-default dropdown-toggle" name="anio2">
        <?php
        for($k=date('Y'); $k>=1910; $k--){
            if ($k == date('Y'))
                echo '<option value="'.$k.'" selected>'.$k.'</option>';
            else
                echo '<option value="'.$k.'">'.$k.'</option>';
        }echo '<option value="--" selected>--</option>';
        ?>
</select>