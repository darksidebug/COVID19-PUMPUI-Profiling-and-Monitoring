</tbody>
                                            </table>
                                        </div>
                                        <div style="position: relative: top: -10rem;">
                                            <div align=left style="position: relative; top: -1rem; display: inline;  margin-bottom: 20px;">
                                                <form name="form_pui" action="<?= base_url(); ?>user/update_ext_rel" method="post" style="position: relative: right: 0px; float: left; padding-left: 8px; top: -5rem; display: inline-block; letter-spacing: 0.07rem;">
                                                    <input type="hidden" name="code" value="<?=$value->person_code;?>">
                                                    <input type="hidden" name="ext_release" value="Released">
                                                    <button style="background: rgba(1, 93, 214, 0.8); border-radius: 2px; color: #fff; letter-spacing:0.07rem;" class="btn btn-sm"><i class="fa fa-check"></i> RELEASE</button>
                                                </form>
                                                <form name="form_pum" action="<?= base_url(); ?>user/update_ext_rel" method="post" style="position: relative: right: 0px; float: left; padding-left: 5px; top: -2rem; display: inline-block; letter-spacing: 0.07rem;">
                                                    <input type="hidden" name="code" value="<?=$value->person_code;?>">
                                                    <input type="hidden" name="ext_release" value="Quarantine">
                                                    <button style="background: rgba(1, 93, 214, 0.8); border-radius: 2px; color: #fff; letter-spacing:0.07rem;" class="btn btn-sm"><i class="fa fa-arrow-left"></i> QUARANTINE</button>
                                                </form>
                                                <form name="form_pum" action="<?= base_url(); ?>user/update_ext_rel" method="post" style="position: relative: right: 0px; float: left; padding-left: 5px; top: -2rem; display: inline-block; letter-spacing: 0.07rem;">
                                                    <input type="hidden" name="code" value="<?=$value->person_code;?>">
                                                    <input type="hidden" name="ext_release" value="Extended">
                                                    <button style="background: rgba(1, 93, 214, 0.8); border-radius: 2px; color: #fff; letter-spacing:0.07rem;" class="btn btn-sm">EXTEND <i class="fa fa-arrow-right"></i></button>
                                                </form>
                                            </div>
                                            
                                            <div align=left style="position: relative; top: -1rem; display: inline;  margin-bottom: 20px;">
                                                <form name="form_pui" action="<?= base_url(); ?>user/update_status" method="post" style="position: relative: right: 0px; float: right; padding-right: 8px; top: -5rem; display: inline-block; letter-spacing: 0.07rem;">
                                                    <input type="hidden" name="code" value="<?=$value->person_code;?>">
                                                    <input type="hidden" name="pum_pui" value="pum">
                                                    <button type="submit" name="pum" id="<?= $value->person_code; ?>" style="background: rgba(1, 93, 214, 0.8); border-radius: 2px; color: #fff; letter-spacing:0.07rem;" class="btn btn-sm update"><i class="fa fa-arrow-down"></i> PUM</button>
                                                </form>
                                                <form name="form_pum" action="<?= base_url(); ?>user/update_status" method="post" style="position: relative: right: 0px; float: right; padding-right: 5px; top: -2rem; display: inline-block; letter-spacing: 0.07rem;">
                                                    <input type="hidden" name="code" value="<?=$value->person_code;?>">
                                                    <input type="hidden" name="pum_pui" value="pui">
                                                    <button type="submit" name="pui" id="<?= $value->person_code; ?>" style="background: rgba(1, 93, 214, 0.8); border-radius: 2px; color: #fff; letter-spacing:0.07rem;" class="btn btn-sm update"><i class="fa fa-arrow-up"></i>&nbsp;PUI&nbsp;</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>   
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if($this->session->flashdata('update') != ''): ?>
    <?php if($this->session->flashdata('update') == TRUE): ?>
        <script>alert('<?= $this->session->flashdata('message'); ?>');</script>
    <?php endif; ?> 
    <?php if($this->session->flashdata('update') == FALSE): ?>
        <?php if($this->session->flashdata('update') == TRUE): ?>
            <script>alert('<?= $this->session->flashdata('message'); ?>');</script>
        <?php endif; ?> 
    <?php endif; ?>
<?php endif; ?> 
<script>
    $(document).find(".fold-table tr.view").on("click", function(){
        $(this).toggleClass("open").next(".fold").toggleClass("open");
    });

    // $(document).on("click",'.update', function(){
    //     var text = $(this).text();
    //     var code = $(this).attr('id');
    //     $.ajax({
    //         url: $('input[name="url"]').val() + 'user/update_status',
    //         type: 'post',
    //         data : {
    //             text: text,
    //             code: code,
    //             action: 'update'
    //         },
    //         success:function(data){
    //             console.log(data.d);
    //             if(data){
    //                 alert(data);
    //                 // window.location.href = '<?= base_url(); ?>pages/pum_list/nw-chk-list'; 
    //             }else{
    //                 alert(data);
    //             }
    //         }
    //     });
    // });
</script>