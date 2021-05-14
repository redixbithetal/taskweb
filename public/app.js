


$(document).ready(function () {
    $('#UsersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/users_data_table',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'image',
                name: 'image'
            },{
                data: 'name',
                name: 'name'
            },{
                data: 'email',
                name: 'email'
            },{
                data: 'gender',
                name: 'gender'
            },{
                data: 'dob',
                name: 'dob'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
        columnDefs: [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function(data, type, full, meta) {
                       
                             return '<input type="checkbox" class="checkbox" name="related_id[]" value="' + $('<div/>').text(data).html() + '">';
                       
                    }
                },{
            targets: 1,
            render: function (data) {
                if (data != null) {
                    return '<img src="' + data + '" style="height:50px">';
                } else {
                    return '';
                }
            }
        }],
        order: [
            [0, "DESC"]
        ]
    });
});


$(document).ready(function () {
    $('#BirthdayTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/birthday_data_table',
        columns: [{
                data: 'id',
                name: 'id'
            },{
                data: 'name',
                name: 'name'
            },{
                data: 'email',
                name: 'email'
            },{
                data: 'birthday_day',
                name: 'birthday_day'
            },{
                data: 'birthday_date',
                name: 'birthday_date'
            }
        ],
        order: [
            [3, "asc"]
        ]
    });
});

$(document).ready(function () {
    $('#AnniversaryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/anniversary_data_table',
        columns: [{
                data: 'id',
                name: 'id'
            },{
                data: 'name',
                name: 'name'
            },{
                data: 'email',
                name: 'email'
            },{
                data: 'anniversary_day',
                name: 'anniversary_day'
            },{
                data: 'anniversary_date',
                name: 'anniversary_date'
            }
        ],
        order: [
            [3, "asc"]
        ]
    });
});

 function allselect(val){            
             if($('#select-all').prop('checked')==true){
                     $("input[name='related_id[]']").prop('checked',true);
             }
             else{
                 $("input[name='related_id[]']").prop('checked',false);
             }
}

function actionuser(val){
      var arr = [];
      $("input[name='related_id[]']:checked").each(function(){
          arr.push($(this).val());
      });
      $.ajax( {
                url: $("#url_path").val()+"/changeuserstatus?status="+val+"&ids="+arr.toString(),
                method:"get",
                success: function( data ) {
                    if(data==1){
                       if(val==1){
                          alert("Users Has Been Accept Successfully");
                       }
                       if(val==2){
                          alert("Users Has Been Reject Successfully");
                       }
                       window.location.reload();
                    }
                }
      }); 
}