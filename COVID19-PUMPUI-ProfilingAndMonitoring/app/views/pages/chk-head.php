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
                            <td rowspan="1" colspan="1" style="width: 412px;">START DATE QUARANTINE</td>
                            <td rowspan="1" colspan="1" style="width: 383px;">END DATE QUARANTINE</td>
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
                                        <td> &nbsp;&nbsp;&nbsp; <?= date('d, F - Y', strtotime($value_q->start_q)); ?></td>
                                        <td> &nbsp;&nbsp;&nbsp; <?= date('d, F - Y', strtotime($value_q->end_q)); ?></td>
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
                                                    &nbsp;<?= date('d, F - Y', strtotime($value_d->date)); ?>
                                            </td>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <td> &nbsp;&nbsp;&nbsp; <?= strtoupper($value->pum_pui); ?></td>
                                    <td> &nbsp;&nbsp;&nbsp; <?= ucfirst($value->remarks); ?></td>
                                </tr>
                                <tr class="fold">
                                    <td colspan="6">
                                        <h4 style="padding-left: 8px; letter-spacing: 0.08rem;">Symptoms count as of today: 
                                            <?php if($counts->count > 0):?>
                                                <span style="color:red;"><?= $counts->count; ?></span> 
                                            <?php else:?>
                                                <span style="color:green;"><?= $counts->count; ?></span> 
                                            <?php endif;?>
                                        </h4>
                                        <p style="padding-left: 8px; margin-top: -5px;">Date quarantine start: <a><?= date('d, M - Y', strtotime($value_q->start_q)); ?></a> &nbsp; end: <a><?= date('d, M - Y', strtotime($value_q->end_q)); ?></a></p>
                                        <span style="padding-left: 8px; position: relative; top: -4px;">
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
                                        <div class="fold-content">
                                            <table border="1" width="100%" id="chk-list">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center" colspan="1" rowspan="2" width="10%">No. of Days</td>
                                                        <th class="text-center" colspan="11">SYMPTOMS</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Normal Temp</td>
                                                        <td>No Symptoms</td>
                                                        <td>Fever (Temp)</td>
                                                        <td>Cough</td>
                                                        <td>Sore Throat</td>
                                                        <td>Difficulty Breathing</td>
                                                        <td>Runny Nose</td>
                                                        <td>Other Symptoms</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(!empty($data['count'])): ?> 
                                                    <?php if(!empty($data['value'])): ?>      
                                                        <?php foreach($data['value'] as $key => $value): ?>
                                                            <?php foreach($value->day as $row => $val): ?>             
                                                                <tr>
                                                                    <td>
                                                                        <table width="100%" id="days">
                                                                            <tr>
                                                                                <td rowspan="2"><?= $val->day; ?></td>
                                                                                <td>AM</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>PM</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <!-- normal temp -->
                                                                    <td>
                                                                        <table width="100%" id="symptoms">    
                                                                            <tr class='1 normal-temp' id="am"> 
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && substr($value->temp, 0, 2) < 38): ?>
                                                                                        <td style="position: relative; padding-left: 2px; z-index: 10" contenteditable=false 
                                                                                        id="1 normal-temp am" width="100%"><?=(substr($value->temp, 0, 2) < 38) ? $value->temp : '';?></td>
                                                                                    <?php else: ?>
                                                                                        <td contenteditable=true id="1 normal-temp pm"></td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>                            
                                                                            </tr>
                                                                            <tr class='1 normal-temp' id="pm">                                         
                                                                                <?php if(!empty($value->pm) && substr($value->temp, 0, 2) < 38): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10" contenteditable=false 
                                                                                    id="1 normal-temp pm"><?=(substr($value->temp, 0, 2) < 38) ? $value->temp : '';?></td>
                                                                                <?php else: ?>
                                                                                    <td contenteditable=true id="1 normal-temp pm"></td>
                                                                                <?php endif; ?>                                   
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <!-- no symptom -->
                                                                    <td align="center">
                                                                        <table width="100%" id="symptoms">
                                                                            <tr align="center">
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && $value->symptoms == 'no-symptoms'): ?>
                                                                                        <td width="100%" style="" align="center">                               
                                                                                            <div style=";" class="parent am toggle" id="1 no-symptoms am" align="center">
                                                                                                <div class="first-child am" id="1 no-symptoms am">
                                                                                                    <input type="checkbox" name="am_tbl_chk[]" id="1 no-symptoms am">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 no-symptoms am">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php else: ?>
                                                                                        <td>                               
                                                                                            <div class="parent am" id="1 no-symptoms am">
                                                                                                <div class="first-child am" id="1 no-symptoms am">
                                                                                                    <input type="checkbox" name="am_tbl_chk[]" id="1 no-symptoms am">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 no-symptoms am">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>
                                                                            </tr>
                                                                            <tr align="center">
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->pm) && $value->symptoms == 'no-symptoms'): ?>
                                                                                        <td style="" align="center">                               
                                                                                            <div style="" class="parent pm toggle" id="1 no-symptoms pm" align="center">
                                                                                                <div class="first-child pm" id="1 no-symptoms pm">
                                                                                                    <input type="checkbox" name="pm_tbl_chk[]" id="1 no-symptoms pm">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 no-symptoms pm">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php else: ?>
                                                                                        <td>                               
                                                                                            <div class="parent pm" id="1 no-symptoms pm">
                                                                                                <div class="first-child pm" id="1 no-symptoms pm">
                                                                                                    <input type="checkbox" name="pm_tbl_chk[]" id="1 no-symptoms pm">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 sore-throat pm">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                <!-- fever -->
                                                                    <td>
                                                                        <table width="100%" id="symptoms">
                                                                            <!-- <tr class='1 fever-temp' id="am"> 
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && substr($value->temp, 0, 2) >= 38): ?>
                                                                                        <td style="position: relative; padding-left: 8px; z-index: 10" contenteditable=false 
                                                                                        id="1 fever-temp am" width="100%"><?=(substr($value->temp, 0, 2) >= 38) ? $value->temp : '';?></td>
                                                                                    <?php else: ?>
                                                                                        <td contenteditable=true id="1 fever-temp pm"></td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>                            
                                                                            </tr>
                                                                            <tr class='1 fever-temp' id="pm">                                         
                                                                                <?php if(!empty($value->pm) && substr($value->temp, 0, 2) >= 38): ?>
                                                                                    <td style="position: relative; left: 4px; z-index: 10" contenteditable=false 
                                                                                    id="1 fever-temp pm"><?=(substr($value->temp, 0, 2) >= 38) ? $value->temp : '';?></td>
                                                                                <?php else: ?>
                                                                                    <td contenteditable=true id="1 fever-temp pm"></td>
                                                                                <?php endif; ?>                                   
                                                                            </tr> -->
                                                                            <tr>
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && $value->symptoms == 'fever'): ?>
                                                                                        <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10; padding-right: 0px;" align="center">                               
                                                                                            <div style="position: absolute; top: 2px; left: 5rem;" class="parent am toggle" id="1 fever am" align="center">
                                                                                                <div class="first-child am" id="1 fever am">
                                                                                                    <input type="checkbox" name="am_tbl_chk[]" id="1 fever am">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 fever am" align="center">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php else: ?>
                                                                                        <td style="border-bottom: 0px;">                               
                                                                                            <div class="parent am" id="1 fever am">
                                                                                                <div class="first-child am" id="1 fever am">
                                                                                                    <input type="checkbox" name="am_tbl_chk[]" id="1 fever am">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 fever am">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>
                                                                            </tr>
                                                                            <tr>
                                                                                <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->pm) && $value->symptoms == 'fever'): ?>
                                                                                        <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                            <div style="position: absolute; top: 2px; right: 4.5rem;" class="parent pm toggle" id="1 fever pm">
                                                                                                <div class="first-child pm" id="1 fever pm">
                                                                                                    <input type="checkbox" name="pm_tbl_chk[]" id="1 fever pm">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 fever pm">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php else: ?>
                                                                                        <td>                               
                                                                                            <div class="parent pm" id="1 fever pm">
                                                                                                <div class="first-child pm" id="1 fever pm">
                                                                                                    <input type="checkbox" name="pm_tbl_chk[]" id="1 fever pm">
                                                                                                </div>
                                                                                                <div class="second-child" id="1 fever pm">
                                                                                                    <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    <?php endif; ?>       
                                                                                <?php endforeach;?>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                <!-- cough -->
                                                                    <td>
                                                                    <table width="100%" id="symptoms" class="cough">
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'cough'): ?>
                                                                                    <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10;" align="center">                               
                                                                                        <div style="position: absolute; top: 2px; left: 2rem;" class="parent am toggle" id="1 cough am">
                                                                                            <div class="first-child am" id="1 cough am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 cough am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 cough am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent am" id="1 cough am">
                                                                                            <div class="first-child am" id="1 cough am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 cough am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 cough am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->pm) && $value->symptoms == 'cough'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                        <div style="position: absolute; top: 2px; left: -2.3rem;" class="parent pm toggle" id="1 cough pm">
                                                                                            <div class="first-child pm" id="1 cough pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 cough pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 cough pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent pm" id="1 cough pm">
                                                                                            <div class="first-child pm" id="1 cough pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 cough pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 cough pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            <!-- sore throat -->
                                                                <td>
                                                                    <table width="100%" id="symptoms">
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'sore-throat'): ?>
                                                                                    <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10;" align="center">                               
                                                                                        <div style="position: absolute; top: 2px; left: 4rem;" class="parent am toggle" id="1 sore-throat am">
                                                                                            <div class="first-child am" id="1 sore-throat am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 sore-throat am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 sore-throat am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent am" id="1 sore-throat am">
                                                                                            <div class="first-child am" id="1 sore-throat am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 sore-throat am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 sore-throat am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->pm) && $value->symptoms == 'sore-throat'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                        <div style="position: absolute; top: 2px; right: 4.5rem;" class="parent pm toggle" id="1 sore-throat pm">
                                                                                            <div class="first-child pm" id="1 sore-throat pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 sore-throat pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 sore-throat pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent pm" id="1 sore-throat pm">
                                                                                            <div class="first-child pm" id="1 sore-throat pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 sore-throat pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 sore-throat pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            <!-- breathing -->
                                                                <td>
                                                                    <table width="100%" id="symptoms">
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'difficulty-breathing'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                        <div style="position: absolute; top: 2px; left: 12rem;" class="parent pm toggle" id="1 difficulty-breathing pm">
                                                                                            <div class="first-child pm" id="1 difficulty-breathing pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 difficulty-breathing pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 difficulty-breathing pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent pm" id="1 difficulty-breathing pm">
                                                                                            <div class="first-child pm" id="1 difficulty-breathing pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 difficulty-breathing pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 difficulty-breathing pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->pm) && $value->symptoms == 'difficulty-breathing'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                        <div style="position: absolute; top: 2px; left: -0.4rem;" class="parent pm toggle" id="1 difficulty-breathing pm">
                                                                                            <div class="first-child pm" id="1 difficulty-breathing pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 difficulty-breathing pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 difficulty-breathing pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent pm" id="1 difficulty-breathing pm">
                                                                                            <div class="first-child pm" id="1 difficulty-breathing pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 difficulty-breathing pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 difficulty-breathing pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            <!-- runny nose -->
                                                                <td>
                                                                    <table width="100%" id="symptoms">
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'runny-nose'): ?>
                                                                                    <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10;" align="center">                               
                                                                                        <div style="position: absolute; top: 2px; left: 4rem; margin-left: 6px;" class="parent am toggle" id="1 sore-throat am">
                                                                                            <div class="first-child am" id="1 runny-nose am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 runny-nose am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 runny-nose am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent am" id="1 runny-nose am">
                                                                                            <div class="first-child am" id="1 runny-nose am">
                                                                                                <input type="checkbox" name="am_tbl_chk[]" id="1 runny-nose am">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 runny-nose am">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->pm) && $value->symptoms == 'runny-nose'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10;">                               
                                                                                        <div style="position: absolute; top: 2px; right: 4.5rem;" class="parent pm toggle" id="1 runny-nose pm">
                                                                                            <div class="first-child pm" id="1 runny-nose pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 runny-nose pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 runny-nose pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php else: ?>
                                                                                    <td>                               
                                                                                        <div class="parent pm" id="1 runny-nose pm">
                                                                                            <div class="first-child pm" id="1 runny-nose pm">
                                                                                                <input type="checkbox" name="pm_tbl_chk[]" id="1 runny-nose pm">
                                                                                            </div>
                                                                                            <div class="second-child" id="1 runny-nose pm">
                                                                                                <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <!-- other symptoms -->
                                                                <td>
                                                                    <table width="100%" id="symptoms">
                                                                        <tr class='1 other-symptoms' id="am"> 
                                                                            <?php foreach($val->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'other-symptoms'): ?>
                                                                                    <td style="position: relative; left: 0px; z-index: 10" contenteditable=false 
                                                                                    id="1 other-symptoms pm" contenteditable=false id="1 other-symptoms am" width="100%"><?=$value->temp;?></td>
                                                                                <?php else: ?>
                                                                                    <td style="" contenteditable=true id="1 other-symptoms pm"></td>
                                                                                <?php endif; ?>       
                                                                            <?php endforeach;?>                            
                                                                        </tr>
                                                                        <tr class='1 other-symptoms' id="pm">                                         
                                                                            <?php if(!empty($value->pm) && $value->symptoms == 'other-symptoms'): ?>
                                                                                <td style="position: relative; left: 0px; z-index: 10" contenteditable=false 
                                                                                    id="1 other-symptoms pm" width="100%"><?=$value->temp;?></td>
                                                                            <?php else: ?>
                                                                                <td style="border-top: 1px solid rgba(0, 0, 0, 0.5);" contenteditable=true id="1 other-symptoms pm"></td>
                                                                            <?php endif; ?>                                   
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach;?>      
                                                    <?php endforeach;?> 
                                                <?php endif; ?>
                                            <?php else: ?> 
                                                <?php $this->load->view('template/day1'); ?>
                                            <?php endif; ?>  
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