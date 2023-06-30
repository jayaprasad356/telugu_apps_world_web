<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$date = new DateTime;
$date->format('h:i:s a');

?>
<?php
if (isset($_POST['btnAdd'])) {

        $date = $db->escapeString(($_POST['date']));
        $sunrise= $db->escapeString($_POST['sunrise']);
        $sunset = $db->escapeString($_POST['sunset']);
        $moonrise = $db->escapeString($_POST['moonrise']);
        $moonset= $db->escapeString($_POST['moonset']);

        
        if (empty($date)) {
            $error['date'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($sunrise)) {
            $error['sunrise'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($sunset)) {
            $error['sunset'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($moonrise)) {
            $error['moonrise'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($moonset)) {
            $error['moonset'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($date) && !empty($sunrise) && !empty($sunset) && !empty($moonrise) && !empty($moonset)) {
         
            $sql = "SELECT * FROM panchangam WHERE date = '$date'";
            $db->sql($sql);
            $res = $db->getResult();
            $num = $db->numRows($res);
            if ($num >= 1){   
                $error['add_panchangam'] = " <span class='label label-danger'>Panchangam already in this date</span>";
            }
            else{
                $sql_query = "INSERT INTO panchangam (date,sunrise,sunset,moonrise,moonset)VALUES('$date','$sunrise','$sunset','$moonrise','$moonset')";
                $db->sql($sql_query);
                $result = $db->getResult();
                if (!empty($result)) {
                    $result = 0;
                } else {
                    $result = 1;
                }
    
                if ($result == 1) {
                    $sql = "SELECT id FROM panchangam ORDER BY id DESC LIMIT 1";
                    $db->sql($sql);
                    $res = $db->getResult();
                    $panchangam_id = $res[0]['id'];
                    for ($i = 0; $i < count($_POST['title']); $i++) {
        
                        $title = $db->escapeString(($_POST['title'][$i]));
                        $description = $db->escapeString(($_POST['description'][$i]));
                        $sql = "INSERT INTO panchangam_variant (panchangam_id,title,description) VALUES('$panchangam_id','$title','$description')";
                        $db->sql($sql);
                        $panchangam_variant_result = $db->getResult();
                    }
                    if (!empty($panchangam_variant_result)) {
                        $panchangam_variant_result = 0;
                    } else {
                        $panchangam_variant_result = 1;
                    }
                    
                    $error['add_panchangam'] = "<section class='content-header'>
                                                    <span class='label label-success'>Panchangam Added Successfully</span> </section>";
                } else {
                    $error['add_panchangam'] = " <span class='label label-danger'>Failed</span>";
                }
                }
                
            }

        }
?>
<section class="content-header">
    <h1>Add Panchangam <small><a href='panchangam.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Panchangam</a></small></h1>

    <?php echo isset($error['add_panchangam']) ? $error['add_panchangam'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_product" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Date</label> <i class="text-danger asterik">*</i><?php echo isset($error['date']) ? $error['date'] : ''; ?>
                                            <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Sunrise</label> <i class="text-danger asterik">*</i><?php echo isset($error['sunrise']) ? $error['sunrise'] : ''; ?>
                                            <input type="time" class="form-control" name="sunrise" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Sunset</label> <i class="text-danger asterik">*</i><?php echo isset($error['sunset']) ? $error['sunset'] : ''; ?>
                                            <input type="time" class="form-control" name="sunset" required>
                                    </div>

                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Moonrise</label> <i class="text-danger asterik">*</i><?php echo isset($error['moonrise']) ? $error['moonrise'] : ''; ?>
                                            <input type="time" class="form-control" name="moonrise" required>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Moonset</label> <i class="text-danger asterik">*</i><?php echo isset($error['moonset']) ? $error['moonset'] : ''; ?>
                                            <input type="time" class="form-control" name="moonset" required>
                                    </div>

                                 </div>
                            </div>
                            <br>
                            <div id="packate_div"  >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Title</label> <i class="text-danger asterik">*</i>
                                            <input type="text" class="form-control" name="title[]" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group packate_div">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i>
                                            <textarea type="text" rows="2" class="form-control" name="description[]" required></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-1">
                                        <label>Tab</label>
                                        <a class="add_packate_variation" title="Add variation of panchangam" style="cursor: pointer;color:white;"><button class="btn btn-warning">Add more</button></a>
                                    </div>
                                    <div id="variations">
                                    </div>
                                </div>
                            </div>
                    </div>
                   <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
                    </div>

                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_panchangam').validate({

        ignore: [],
        debug: false,
        rules: {
            date: "required",
            sunrise: "required",
            sunset: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var max_fields = 8;
        var wrapper = $("#packate_div");
        var add_button = $(".add_packate_variation");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="row"><div class="col-md-4"><div class="form-group"><label for="title">Title</label>' +'<input type="text" class="form-control" name="title[]" required /></div></div>' + '<div class="col-md-4"><div class="form-group"><label for="description">Description</label>'+'<textarea type="text" row="2" class="form-control" name="description[]" required></textarea></div></div>'+'<div class="col-md-1" style="display: grid;"><label>Tab</label><a class="remove" style="cursor:pointer;color:white;"><button class="btn btn-danger">Remove</button></a></div>'+'</div>');
            }
            else{
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".remove", function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
            x--;
        })
    });
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>