<div class="container pum-lists" >
    <input type="hidden" name="url" value="<?= base_url(); ?>">
    <div id="dt_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
            <div class="col-sm-6">
                <form action="<?= base_url(); ?>pages/load/nw-chk-list" method="post">
                    <div class="dataTables_length" id="dt_length">
                        <label>
                            <select name="dt_length" aria-controls="dt" class="form-control input-sm" style="width: 100px;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <button type="submit" id="sign_in" class="btn btn-warning" 
                                style="padding-top: 8px;padding-bottom: 8px;background-color: #015DD6;border: 1px solid #015DD6;
                                    border-radius: 2px;letter-spacing: 0.08rem;outline: none;">
                                    LOAD <i class="fa fa-chevron-right"></i></button>
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="<?= base_url(); ?>pages/list/nw-chk-list" method="post">
                    <div id="dt_filter" class="dataTables_filter">
                        <label>
                            <input type="search" name="search" class="form-control input-sm" placeholder="Search...." aria-controls="dt" style="width: 300px; letter-spacing: 0.08rem;">
                            <button type="submit" id="sign_in" class="btn btn-warning" 
                            style="padding-top: 8px;padding-bottom: 8px;background-color: #015DD6;border: 1px solid #015DD6;
                                border-radius: 2px;letter-spacing: 0.08rem;outline: none;">
                                <i class="fa fa-search"></i> SEARCH</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <?php if(!empty($count['one'])): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"
                    style="border: 1px solid rgba(0, 0, 0, 0.4); position: relative; border-radius: 2px; background: #fff;">
                    
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo2" style="padding-left: 10px; padding-right: 10px;">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                aria-expanded="false" aria-controls="collapseTwo2" style="text-decoration: none;">
                                <?php foreach ($count['one'] as $key => $value): ?>
                                    <h4 class="mb-0" style="font-size: 17px; letter-spacing: 0.06rem; color: #015DD6">
                                        Number of PUM|PUI in Municipality of <?= $value->municipal; ?> &nbsp;<i class="fa fa-angle-down rotate-icon"></i>
                                    </h4>
                                <?php endforeach; ?>
                                </a>
                                <h4 style="float: right; font-size: 13px; letter-spacing: 0.06rem; position: absolute; 
                                    top: 3px; right: 0; padding-right: 10px;">Total PUM/PUI: 
                                    <?= ($value->brgy_count < 10) ? '0'.$value->brgy_count : $value->brgy_count; ?>
                                    | 
                                    
                                    <?php foreach ($count['pum'] as $key => $value): ?>
                                        <span style="color: #015DD6;">PUM: 
                                            <i style="color:red; font-style: normal;"><?= ($value->counts < 10 ? '0'.$value->counts : $value->counts); ?></i>
                                        </span> | 
                                    <?php endforeach; ?>
                                    <?php foreach ($count['pui'] as $key => $value): ?>
                                        <span style="color: #015DD6;">PUI: 
                                            <i style="color:red; font-style: normal;"><?= ($value->counts < 10 ? '0'.$value->counts : $value->counts); ?></i>
                                        </span>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                data-parent="#accordionEx" style="border-top: 1px solid rgba(0, 0, 0, 0.4);">
                                <div class="card-body" style="padding: 10px 20px; height: 300px; overflow-y: auto;">
                                    <?php foreach ($count['new'] as $key => $value): ?>
                                        <?php foreach ($value->barangays as $key => $value): ?>
                                            <h5 style="font-size: 15px; letter-spacing: 0.06rem;"><i class="fa fa-chevron-right"></i> Barangay 
                                            <?= $value->brgy; ?> - <?php foreach($value->brgy_count as $purok => $strt){ echo $strt->counts . ' Individual(s)'; } ?></h5>
                                            <span style="padding-left:30px;">Total PUM|PUI: 
                                                <?= $strt->counts; ?>
                                                | 
                                                <?php foreach ($value->brgy_pum as $key => $value_r): ?>
                                                
                                                    <span style="color: #015DD6;">PUM: 
                                                        <i style="color:red; font-style: normal;"><?= $value_r->pum_counts; ?></i>
                                                    </span> | 
                                                <?php endforeach; ?>
                                                <?php foreach ($value->brgy_pui as $key => $value_s): ?>
                                                    <span style="color: #015DD6;">PUI: 
                                                        <i style="color:red; font-style: normal;"><?= $value_s->pui_counts; ?></i>
                                                    </span>
                                                <?php endforeach; ?>
                                            </span>
                                        <?php endforeach; ?> 
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <table class="table fold-table" id="dt" role="grid" aria-describedby="dt_info" style="width: 1140px;">
                    <thead>
                        <tr role="row">
                            <td rowspan="1" colspan="1" style="width: 201px;">PUM CODE</td>
                            <td rowspan="1" colspan="1" style="width: 412px;">START QUARANTINE</td>
                            <td rowspan="1" colspan="1" style="width: 383px;">END QUARANTINE</td>
                            <td rowspan="1" colspan="1" style="width: 383px;">HEALTH STATUS</td>
                            <td rowspan="1" colspan="1" style="width: 383px;">TYPE</td>
                            <td rowspan="1" colspan="1" style="width: 383px;">STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($data['value'])): ?>
                            <?php foreach($data['value'] as $key => $value): ?>
                                <tr class="view" id="<?= $value->id; ?>">
                                    <td>&nbsp;
                                        <?= $value->person_code; ?> &nbsp; 
                                    </td>
                                    <?php foreach($value->q_day as $key => $value_q): ?>
                                        <td> &nbsp;&nbsp;&nbsp; <?= date('d, M - Y', strtotime($value_q->start_q)); ?></td>
                                        <td> &nbsp;&nbsp;&nbsp; <?= date('d, M - Y', strtotime($value_q->end_q)); ?></td>
                                    <?php endforeach; ?>
                                    
                                    <?php foreach($value->date as $key => $value_d): ?>
                                        <?php foreach($value_d->count as $key => $counts): ?>
                                            <td> &nbsp;&nbsp;&nbsp; 
                                                    <?php if($counts->count > 0):?>
                                                        <?= $counts->count; ?> 
                                                        <i class="fa fa-chevron-up" style="color: red; position: relative; top: -3px;"></i>
                                                    <?php else:?>
                                                        <?= $counts->count; ?> 
                                                        <i class="fa fa-chevron-down" style="color: green; position: relative; top: -4px;"></i>
                                                    <?php endif;?>
                                                    &nbsp;<?= date('d, M - Y', strtotime($value_d->date)); ?>
                                            </td>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <td> &nbsp;&nbsp;&nbsp; <?= strtoupper($value->pum_pui); ?></td>
                                    <td> &nbsp;&nbsp;&nbsp; <?= ucfirst($value->remarks); ?></td>
                                </tr>
                                <tr class="fold">
                                    <td colspan="6">
                                    <div align="right" style="position: relative; top: 0.5rem; padding-rigt: 8px;">
                                        <a style="background: rgba(1, 93, 214, 0.8); border-radius: 1px; color: #fff; letter-spacing:0.07rem;" class="btn btn-xs">
                                         <i class="fa fa-edit"></i></a>
                                        <button id="<?= $value->person_code; ?>" style="background: rgba(1, 93, 214, 0.8); border-radius: 1px; color: #fff; letter-spacing:0.07rem;" class="btn btn-xs del">
                                        <i class="fa fa-trash"></i></button>
                                    </div>
                                    
                                        <h4 style="padding-left: 8px; letter-spacing: 0.08rem; display: inline; position: relative; top: -1.5rem;">Symptoms count as of today: 
                                            <?php if($counts->count > 0):?>
                                                <span style="color:red;"><?= $counts->count; ?></span> 
                                            <?php else:?>
                                                <span style="color:green;"><?= $counts->count; ?></span> 
                                            <?php endif;?>
                                        </h4>
                                        <p style="padding-left: 8px; margin-top: -12px;">Date quarantine start: <a><?= date('d, M - Y', strtotime($value_q->start_q)); ?></a> &nbsp; end: <a><?= date('d, M - Y', strtotime($value_q->end_q)); ?></a></p>
                                        <span style="padding-left: 8px; position: relative; top: -8px;">
                                            Day: 
                                            <?php foreach($value->days as $key => $value_d): ?>
                                                <?php foreach($value_d->worst_symptoms as $key => $keys): ?>
                                                    <?php if($keys->worst > 0):?>
                                                        <?= $keys->day; ?> <i class="fa fa-chevron-up" style="color: red; position: relative; top: -3px;"></i> /
                                                    <?php else:?>
                                                        <?= $keys->day; ?> <i class="fa fa-chevron-down" style="color: green; position: relative; top: -4px;"></i> /
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </span>
                                        <div class="fold-content" style="">
                                            <table width="100%" id="2nd_tbl">
                                                <thead>
                                                    <tr style="border-bottom: 1px solid rgba(0,0,0, 0.5);">
                                                        <td class="text-center" width="20%">DAY</td>
                                                        <td class="text-center" width="20%">AM/PM</td>
                                                        <td width="30%">TEMP</td>
                                                        <td width="30%">SYMPTOMS</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="lists">
                                                    <?php foreach ($value->days as $key => $result):?>
                                                        <tr style="border-top: 1px solid rgba(0,0,0, 0.5);">
                                                            <td width="20%" style="border-right: 1px solid rgba(0,0,0, 0.5); text-align: center;"><?= $result->day; ?></td>
                                                            <td colspan="3" style="padding: 0px;">
                                                                <table style="padding: 0px;">
                                                                    <tr>
                                                                        <td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); 
                                                                        text-align: center; padding-top: 0px; padding-bottom: 0px; padding-right: 10px;">AM</td>
                                                                        <td width="30%" style="padding: 0px;">
                                                                            <table style="padding: 0px;">
                                                                                <?php foreach ($result->day_am as $key => $day_am):?>
                                                                                    <tr>
                                                                                        <td width="30.5%" style="padding-top: 2px; padding-bottom: 2px;"><?= $day_am->temp; ?></td>
                                                                                        <td width="29.5%" style="padding-top: 2px; padding-bottom: 2px;"><?= $day_am->symptoms; ?></td>
                                                                                    </tr>
                                                                                <?php endforeach; ?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-top: 1px solid rgba(0,0,0, 0.5);">
                                                                        <td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); text-align: center; padding-top: 0px; padding-bottom: 0px;">PM</td>
                                                                        <td width="30%" style="padding: 0px;">
                                                                            <table>
                                                                                <?php foreach ($result->day_pm as $key => $day_pm):?>
                                                                                    <tr>
                                                                                        <td width="30.5%" style="padding-top: 2px; padding-bottom: 2px;"><?= $day_pm->temp; ?></td>
                                                                                        <td width="29.5%" style="padding-top: 2px; padding-bottom: 2px;"><?= $day_pm->symptoms; ?></td>
                                                                                    </tr>
                                                                                <?php endforeach; ?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
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
<?php if($this->session->flashdata('update') != '' || $this->session->flashdata('delete') != ''): ?>
    <?php if($this->session->flashdata('update') == TRUE || $this->session->flashdata('delete') == TRUE): ?>
        <script>alert('<?= $this->session->flashdata('message'); ?>');</script>
    <?php endif; ?> 
    <?php if($this->session->flashdata('update') == FALSE || $this->session->flashdata('delete') == FALSE): ?>
        <script>alert('<?= $this->session->flashdata('message'); ?>');</script>
    <?php endif; ?>
<?php endif; ?> 
<script>
    $(document).find(".fold-table tr.view").on("click", function(){
        $(this).toggleClass("open").next(".fold").toggleClass("open");
    });
</script>