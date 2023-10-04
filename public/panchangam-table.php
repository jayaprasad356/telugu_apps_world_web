
<section class="content-header">
    <h1>Panchangam /<small><a href="home.php"><i class="fa fa-home"></i> Home</a></small></h1>
    <ol class="breadcrumb">
        <a class="btn btn-block btn-default" href="add-panchangam.php"><i class="fa fa-plus-square"></i> Add Panchangam</a>
    </ol>
</section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                            <div class="form-group col-md-3">
                                <h4 class="box-title">Filter by Year </h4><br>
                                <select id='year' name="year" class='form-control'>
                                    <option value="">select</option>
                                        <?php
                                        $sql = "SELECT id,year FROM `years`";
                                        $db->sql($sql);
                                        $result = $db->getResult();
                                        foreach ($result as $value) {
                                        ?>
                                            <option value='<?= $value['year'] ?>'><?= $value['year'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    
                    <div  class="box-body table-responsive">
                    <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=panchangam" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="false" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    
                                     <th  data-field="id">S.No</th>
                                    <th data-field="date" data-sortable="true">Date</th>
                                    <th  data-field="sunrise" data-sortable="true">Sunrise</th>
                                    <th  data-field="sunset" data-sortable="true"> Sunset</th>
                                    <th  data-field="moonrise" data-sortable="true"> Moonrise</th>
                                    <th  data-field="moonset" data-sortable="true"> Moonset</th>
                                    <th  data-field="operate" data-events="actionEvents">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="separator"> </div>
        </div>
    </section>

<script>
     $('#year').on('change', function() {
        id = $('#year').val();
        $('#users_table').bootstrapTable('refresh');
    });
   
    function queryParams(p) {
        return {
            "year": $('#year').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>