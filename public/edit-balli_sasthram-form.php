<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])) {
    $error = array();
    $title = $db->escapeString($fn->xss_clean($_POST['title']));
    $description = $db->escapeString($fn->xss_clean($_POST['description']));

    $sql = "UPDATE balli_sasthram SET title='$title',description='$description' WHERE id = '$ID'";
    $db->sql($sql);
    $result = $db->getResult();
    if (!empty($result)) {
        $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
    } else {
        $error['add_menu'] = " <span class='label label-success'>Balli Sasthram Updated Successfully</span>";
    }
    
}

$data = array();

$sql_query = "SELECT * FROM `balli_sasthram` WHERE id = '$ID'";
$db->sql($sql_query);
$res = $db->getResult();
foreach ($res as $row)
$data = $row;

?>
<section class="content-header">
    <h1>Edit Balli Sasthram<small><a href='balli_sasthram.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Balli Sasthram</a></small></h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_sasthram_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="form-group">
                                    <label for="exampleInputEmail1"> Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['title']) ? $error['title'] : ''; ?>
                                    <input type="text" class="form-control" name="title" value="<?php echo $data['title']?>" required>
                            </div>
                            <br>
                            <div class="form-group">
                                        <label for="exampleInputEmail1">Description :</label> <i class="text-danger asterik">*</i> <?php echo isset($error['description']) ? $error['description'] : ''; ?>
                                        <textarea name="description" id="description" class="form-control" rows="16"><?php echo $data['description']; ?></textarea>
                                        <script type="text/javascript" src="css/js/ckeditor/ckeditor.js"></script>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('description');
                                        </script>
                            </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
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
    $('#edit_sasthram_form').validate({
        rules: {
            title: "required",
            description: {
                required: function(textarea) {
                    CKEDITOR.instances[textarea.id].updateElement();
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                    return editorcontent.length === 0;
                }
            }
        }
    });
</script>