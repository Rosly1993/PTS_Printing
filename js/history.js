$(function(){
    $('.delete-history').click(function(){
        var _conf = confirm('Are you sure to delete history data permanently?')
        if(_conf === true){
            location.href="./delete_history.php?id="+$(this).attr('data-id')
        }
    })

})


        $('#myTable').DataTable( 
          {
            columnDefs: [
              {
                  searchable: false,
                  orderable: false,
                  targets: 0,
                  
              },
          ],
          order: [[1, 'asc']],
          dom: 'Blfrtip',
          "pageLength": 10,
          "responsive": true,
    
          lengthMenu: [
              [10, 20, 25, 50 ,100,  -1],
              [10, 20, 25, 50 ,100,  "All"],
          ],
      buttons: [
            //    {
            //               extend: 'excelHtml5',
            //               text:'<a class="text-white exc-btn"><i class="fa fa-file-excel  text-white"></i>&nbsp;&nbsp;Excel Download</a>',
            //               className: "buttontest",
            //               autoFilter: true,
            //               sheetName: 'Exported data',
            //               exportOptions: {
            //                   columns: ':visible'
            //               },  title: 'RTS',
            //           },
                     
      ]
  })
      
      