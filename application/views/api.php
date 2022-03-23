<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="<?php echo base_url('assets/css/')?>bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body>
<br>
<div class="container">
    <div class="row">
    <form action="<?= base_url('api/getrekammediklist'); ?>" method="post">
        <div class="col-12">
        <p>PILIH RM NAME</p>
                <select class="form-select" aria-label="Default select example" name="rm_no" id="rm_no">
                <option selected>-- SELECT ONE --</option>
                <?php
                foreach ($data as $data){
                $no_rekam_medik="";
                foreach ($data['metadata'] as $metadata){
                        if ($metadata['properties']['item_type']=="rm_pasien"){
                            $no_field=1;
                            foreach ($metadata['properties']['fields'] as $fields){
                                if ($no_field==1){
                                    echo "<option value=".$data['id'].">".$fields['value']."</option>";
                                }
                                $no_field++;
                            }
                        }
                }
                }
                    ?>
                    </select>
                    <br>
                    <br>

            <button type="submit" class="btn btn-primary">Seacrh</button>
            </div>
            </form>
    </div>
</div>
</body>
</html>