<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $name = $db->escapeString(($_POST['name']));
        $description = $db->escapeString(($_POST['description']));
        $location = $db->escapeString(($_POST['location']));


        // get image info
        $menu_image = $db->escapeString($_FILES['temple_image']['name']);
        $image_error = $db->escapeString($_FILES['temple_image']['error']);
        $image_type = $db->escapeString($_FILES['temple_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["temple_image"]["name"]));
        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($location)) {
            $error['location'] = " <span class='label label-danger'>Required!</span>";
        }

       
       
       
       if (!empty($name) && !empty($description) && !empty($location)) {

                $result = $fn->validate_image($_FILES["temple_image"]);
                // create random image file name
                $string = '0123456789';
                $file = preg_replace("/\s+/", "_", $_FILES['temple_image']['name']);
                $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;

                // upload new image
                $upload = move_uploaded_file($_FILES['temple_image']['tmp_name'], 'upload/temples/' . $menu_image);

                // insert new data to menu table
                $upload_image = 'upload/temples/' . $menu_image;
         
            $sql_query = "INSERT INTO temples (name,description,location,image)VALUES('$name','$description','$location','$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_temple'] = "<section class='content-header'>
                                                <span class='label label-success'>Temple Added Successfully</span> </section>";
            } else {
                $error['add_temple'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Temple <small><a href='temples.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Temples</a></small></h1>

    <?php echo isset($error['add_temple']) ? $error['add_temple'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_temple_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                            <input type="text" class="form-control" name="name" required/>
                                    </div>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="form-group">
                                     <div class="col-md-10">
                                            <label for="exampleInputEmail1">Description</label> <i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                            <textarea rows="3" type="text" class="form-control" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-6">
                                            <label for="exampleInputEmail1">Location</label> <i class="text-danger asterik">*</i><?php echo isset($error['location']) ? $error['location'] : ''; ?>
                                            <input type="text" class="form-control" name="location" required/>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['temple_image']) ? $error['temple_image'] : ''; ?>
                                            <input type="file" name="temple_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="temple_image" required/><br>
                                            <img id="blah" src="#" alt="" />
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

            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_temple_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            description="required",
            location: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>

<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(250)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>