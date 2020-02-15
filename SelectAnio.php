<select  style="margin: 5px" class="btn btn-default dropdown-toggle" name="anio">
        <?php
        for($k=date('Y'); $k>=1910; $k--){
            if ($k == date('Y'))
                echo '<option value="'.$k.'" selected>'.$k.'</option>';
            else
                echo '<option value="'.$k.'">'.$k.'</option>';
        }echo '<option value="--" selected>--</option>';
        ?>
</select>