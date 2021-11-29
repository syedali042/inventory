<?php if(!isset($_SESSION['login_admin'])){header('Location: exec');} ?>
<div class="container">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Owners</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard / Owners </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row" style="padding-left: 15px;">
        <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter by id, name, email, contact, or address" style="width: 40%;display:inline-block;float:right;margin-right:20px;">
    </div><br>
    <div class="row">
        <div class="col-sm-12">
            <table style="background-color: #fff;" id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                <thead>
                <tr role="row" style="text-align:center;">
                    <!-- <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 209px;">Rooms</th> -->
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 122px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Contact</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 154px;">Address</th>
                </tr>
                </thead>
                <tbody id="ownersTable">
                <?php foreach ($Members as $key => $owner): ?>
                    <tr>
                        <td>#2020<?=$owner['owner_id']?></td>
                        <td><?=$owner['owner_username']?></td>
                        <td><?=$owner['owner_email']?></td>
                        <td><?=$owner['owner_contact']?></td>
                        <td><?=$owner['owner_address']?></td>
                    </tr>

                <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#ownersTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

 
