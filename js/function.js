 $(document).ready(function() {
            $('#srch').keyup(function() {
                var sid = $(this).val();
                var data_String = 'sid=' + sid;
                $.get('search_personnel.php', data_String, function(result) {

                    $.each(result, function(){
                        $('#tto').val(this.Full_N);
                        $('#ttopos').val(this.Designation);
                        $('#sector').val(this.Division_Sector);
                       
                    });


                });
            });
        });