<script>
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#salariesInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#salariesTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    
    $('.empSalary').click(function(){

        $this = $(this);
        var emp_id = $this.parent('div').children('.emp_id').val();
        var hotel_id = $this.parent('div').children('.hotel_id').val();
        var action = 'empSalary';
        $('#salariesTable').empty();
        $.post('<?=AJAX?>empAjax.php', {emp_id:emp_id, hotel_id:hotel_id, action:action}, function(resp){

            resp = $.parseJSON(resp);
            if(resp.status==true){
                
                var sal = resp.data;
                sal.forEach(function(e){
                    console.log(e);
                    $('#salariesTable').append('<tr><td>'+e.emp_id+'</td><td>'+e.emp_basic+'</td><td>'+e.emp_bonus+'</td><td>'+e.emp_ta+'</td><td>'+e.emp_da+'</td><td>'+e.emp_hra+'</td><td>'+e.emp_ma+'</td><td>'+e.sal_date+'</td><td><a href="javascript://" class="btn btn-primary btn-sm editEmpSalary"><i class="fa fa-edit"></i> Edit</a>&nbsp;<a href="javascript://" class="btn btn-danger btn-sm editEmpSalary"><i class="fa fa-trash"></i> Delete</a></td></tr>');
                })
                $('#salariesModal').modal('show');
            }

        });

    });
});
</script>