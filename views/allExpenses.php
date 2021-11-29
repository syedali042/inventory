<div class="container">
    <?php 
        function dateConvert($date){
        $Month = date("F", strtotime($date));
        $Date = date("d", strtotime($date));
        $Year = date("y", strtotime($date));
        return $Month.' '.$Date.', 20'.$Year;
        }
    ?>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Expenses</strong>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="container" id="top-row">
                    <a href="javascript://" id="viewBetDate" class="btn btn-info"><i class="fa fa-eye"></i> View B/w Dates</a>
                    <a href="javascript://" id="viewByDate" class="btn btn-success"><i class="fa fa-calender"></i> View By Dates</a>
                    <input id="myInput" type="text" class="form-control" placeholder="&#128269; Filter By Any Field" style="width: 20%;display:inline-block;float:right;margin-right:20px;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 30px;">Expense ID</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Expense Amount</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 154px;">Exp Description</th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 70px;">Last Updated</th> -->
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 70px;">Exp Made On</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="expenseTable">
                            <?php foreach ($getHotelExpenses as $key => $exp): ?>
                            <tr role="row" class="odd">
                                <input type="hidden" class="exp_id" value="<?=$exp['exp_id']?>">
                                <td class="exp_amount">#<?=$exp['exp_id']?></td>
                                <td class="exp_amount"><?=$exp['exp_amount']?></td>
                                <td class="exp_description"><?=$exp['exp_description']?></td>
                                <!-- <td><?=dateConvert($exp['exp_added_on'])?></td> -->
                                <td><?=dateConvert($exp['exp_added'])?></td>
                                <td class="exp_actions">
                                    <a href="javascript://" class="btn btn-primary btn-sm editExpense"> <i class="fa fa-upload"></i> Update</a>
                                     &nbsp;&nbsp; <a href="javascript://" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#expenseTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        
        $(document).on('click', '#cancelFilteration', function(){

            $this = $(this);

            $this.parent('div').html(function (i, html) {
                return html.replace(/&nbsp;/g, '');
            });
            $('#singleDate').remove();
            $('#viewSingleDate').remove();
            $('#viewByDate').remove();
            $('#date1').remove();
            $('#date2').remove();
            $('#top-row').html('&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewBetDate" class="btn btn-info"><i class="fa fa-eye"></i> View B/w Dates</a>&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewByDate" class="btn btn-success"><i class="fa fa-eye"></i> View By Date</a>');
            $('#cancelFilteration').remove();
            $('#viewBetweenDate').remove();
        });

        $(document).on('click', '#viewBetDate', function(){

            $('#viewBetDate').after('<input type="date" id="date1" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<input type="date" id="date2" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewBetweenDate" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a>&nbsp;&nbsp;<a href="javascript://" id="cancelFilteration" class="btn btn-info"><i class="fa fa-time"></i> Cancel</a>');            
            $('#viewBetDate').remove();
        });

        $(document).on('click', '#viewByDate', function(){

            $('#viewByDate').after('<input type="date" id="singleDate" class="form-control" style="width:25%;display: inline-block;">&nbsp;&nbsp;&nbsp;<a href="javascript://" id="viewSingleDate" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a>&nbsp;&nbsp;<a href="javascript://" id="cancelFilteration" class="btn btn-info"><i class="fa fa-time"></i> Cancel</a>');            
            $('#viewByDate').remove();
        });

        $(document).on('click', '#viewSingleDate', function(){

            var singleDate = $('#singleDate').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
                
            window.open("allExpenses?singleDate="+singleDate+"&hotel_id="+hotel_id, "_self");

        });

        $(document).on('click', '#viewBetweenDate', function(){

            var date1 = $('#date1').val();
            var date2 = $('#date2').val();
            var hotel_id = '<?=$_GET['hotel_id']?>';
                
            window.open("allExpenses?date1="+date1+"&date2="+date2+"&hotel_id="+hotel_id, "_self");

        });

    });

</script>

<!-- Update Edit -->

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $(document).on('click', '.editExpense', function(){
            $this = $(this);
            var exp_id = $this.parent('td').parent('tr').children('.exp_id').val();
            var exp_amount = $this.parent('td').parent('tr').children('.exp_amount').text();
            var exp_description = $this.parent('td').parent('tr').children('.exp_description').text();
            
            $this.parent('td').parent('tr').children('.exp_amount').html('<input type="text" class="updateExpenseAmount  form-control" value="'+exp_amount+'">');

            $this.parent('td').parent('tr').children('.exp_description').html('<textarea class="updateExpenseDescription form-control">'+exp_description+'</textarea>');

            $this.parent('td').html('<a href="javascript://" class="btn btn-primary btn-sm updateThisExpense">Update</a>&nbsp;&nbsp;&nbsp;<a href="javascript://" class="btn btn-danger btn-sm cancelThisUpdation">Cancel</a>');

        })

        $(document).on('click', '.cancelThisUpdation', function(){

            $this = $(this);

            var exp_amount = $this.parent('td').parent('tr').children('.exp_amount').children('.updateExpenseAmount ').val();

            var exp_description = $this.parent('td').parent('tr').children('.exp_description').children('.updateExpenseDescription').val();

            $this.parent('td').parent('tr').children('.exp_amount').text(exp_amount);
            $this.parent('td').parent('tr').children('.exp_description').text(exp_description);

            $this.parent('td').parent('tr').children('.exp_actions').html('<a href="javascript://" class="btn btn-primary btn-sm editExpense"> <i class="fa fa-upload"></i> Update</a>&nbsp;&nbsp; <a href="javascript://" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>');


        })


        $(document).on('click', '.updateThisExpense', function(){

            $this = $(this);
            var hotel_id = '<?=$_GET['hotel_id']?>';
            var exp_id = $this.parent('td').parent('tr').children('.exp_id').val();

            var exp_amount = $this.parent('td').parent('tr').children('.exp_amount').children('.updateExpenseAmount ').val();

            var exp_description = $this.parent('td').parent('tr').children('.exp_description').children('.updateExpenseDescription').val();

            var action = 'updateThisExpense';

            $.post('<?=AJAX?>basic.php', {exp_id:exp_id, hotel_id:hotel_id, exp_amount:exp_amount, exp_description:exp_description, action:action}, function(resp){

                resp = $.parseJSON(resp);

                if(resp.status == true){

                    $this.parent('td').parent('tr').children('.exp_id').text(resp.data.exp_id);
                    $this.parent('td').parent('tr').children('.exp_amount').text(resp.data.exp_amount);
                    $this.parent('td').parent('tr').children('.exp_description').text(resp.data.exp_description);

                    $this.parent('td').parent('tr').children('.exp_actions').html('<a href="javascript://" class="btn btn-primary btn-sm editExpense"> <i class="fa fa-upload"></i> Update</a>&nbsp;&nbsp; <a href="javascript://" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>');

                }

            });

        });


        $(document).on('click', '.deleteFacility', function(){
            $this = $(this);
            var hotel_id = $('#hotel_id').val();
            var facility_id = $this.parent('td').parent('tr').children('.facility_id').val();
            var action = 'deleteFacility';
            $.post('<?=AJAX?>basic.php', {hotel_id:hotel_id, facility_id:facility_id, action:action}, function(resp){

                resp = $.parseJSON(resp);

                if(resp.status==true){

                    $this.parent('td').parent('tr').fadeOut('slow', function(){});

                }

            })
        });

    });

</script>