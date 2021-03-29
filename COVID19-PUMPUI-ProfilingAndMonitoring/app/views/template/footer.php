    <script src="<?= base_url(); ?>source/js/system.js"></script>
    <script>
        $(document).ready(function(){
            
            $(document).on('click', '.del', function(){
                var code = $(this).attr('id');
                if(confirm('Are you sure you want to delete this record? This cannot be undone!')){
                    $.ajax({
                        url: '<?= base_url(); ?>user/delete',
                        type: 'post',
                        data : {
                            code: code,
                            action: 'delete'
                        },
                        success:function(data){
                            const log_oObj = JSON.parse(data);
                            console.log(log_oObj);
                            if(log_oObj.delete == true){
                                alert(log_oObj.message);
                                window.location.href = '<?= base_url(); ?>pages/pum_list/nw-chk-list'; 
                            }else{
                                alert(log_oObj.message);
                            }
                        }
                    });
                }
            })
        });
    </script>
</body>
</html>