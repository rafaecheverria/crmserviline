	$(document).ready(function() {
        $('#datatables').DataTable({

        	"processing": true,
        	"serverSide": true,
        	//languaje: "/plugins/datatables/latino.json",
        	"ajax": "/admin/get_doctor",
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
           //responsive: true,
            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Buscar Registros",
            },
            "columns":[
            	{data: 'rut', name: 'rut'},
            	{data: 'name', name: 'name'},
            	{data: 'last_name', name: 'last_name'},
            	{data: 'phone', name: 'phone'},
            	{data: 'email', name: 'email'},
            	{data: 'edit', name: 'edit'},
            ]
        });

      /*  var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');*/
    });