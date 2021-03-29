<div class="container pum-lists" >
    <input type="hidden" name="url" value="<?= base_url(); ?>">
    <div id="dt_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_length" id="dt_length">
                    <label>Show 
                        <select name="dt_length" aria-controls="dt" class="form-control input-sm" style="width: 100px;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="dt_filter" class="dataTables_filter">
                    <label>Search:
                        <input type="search" class="form-control input-sm" placeholder="Search...." aria-controls="dt" style="width: 300px; letter-spacing: 0.08rem;">
                        <button id="sign_in" class="btn btn-warning" 
                        style="padding-top: 8px;padding-bottom: 8px;background-color: #015DD6;border: 1px solid #015DD6;
                            border-radius: 2px;letter-spacing: 0.08rem;outline: none;">
                            <i class="fa fa-search"></i> SEARCH</button>
                    </label>
                </div>
            </div>
        </div>
        <?php if(!empty($count)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"
                    style="border: 1px solid rgba(0, 0, 0, 0.4); position: relative; border-radius: 2px;">
                    <?php foreach ($count as $key => $value): ?>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo2" style="padding-left: 10px; padding-right: 10px;">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                aria-expanded="false" aria-controls="collapseTwo2" style="text-decoration: none;">
                                    <h4 class="mb-0" style="font-size: 17px; letter-spacing: 0.06rem;">
                                        Number of PUM/PUI in every Barangay's of <?= $value->municipal; ?> &nbsp;<i class="fa fa-angle-down rotate-icon"></i>
                                    </h4>
                                </a>
                                <h4 style="float: right; font-size: 13px; letter-spacing: 0.06rem; position: absolute; 
                                    top: 3px; right: 0; padding-right: 10px;">Total Number of PUI/PUM: 
                                    <?= ($value->brgy_count < 10) ? '0'.$value->brgy_count : $value->brgy_count; ?></h4>
                            </div>
                            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                data-parent="#accordionEx" style="border-top: 1px solid rgba(0, 0, 0, 0.4);">
                                <div class="card-body" style="padding: 10px 20px;">
                                    <?php foreach ($value->barangays as $key => $value): ?>
                                        <h5 style="font-size: 15px; letter-spacing: 0.06rem;"><i class="fa fa-chevron-right"></i> Barangay 
                                        <?= $value->brgy; ?> - <?php foreach($value->purok as $purok => $strt){ echo $strt->PUM . ' Individual(s)'; } ?></h5>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <table class="table fold-table" id="dt" role="grid" aria-describedby="dt_info" style="width: 1140px;">
                    <thead>
                        <tr role="row">
                            <td rowspan="1" colspan="1" aria-sort="ascending" aria-label="PUM CODE: activate to sort column descending" style="width: 201px;">PUM CODE</td>
                            <td rowspan="1" colspan="1" aria-label="START DATE QUARANTINE: activate to sort column ascending" style="width: 412px;">START DATE QUARANTINE</td>
                            <td rowspan="1" colspan="1" aria-label="END DATE QUARANTINE: activate to sort column ascending" style="width: 383px;">END DATE QUARANTINE</td>
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
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date('D d, F - Y', strtotime($value_q->start_q)); ?></td>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date('D d, F - Y', strtotime($value_q->end_q)); ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr class="fold">
                                    <td colspan="3">
                                        <h4 style="padding-left: 8px; letter-spacing: 0.08rem;">Symptoms count as of today: </h4>
                                        <span style="float: right; padding-right: 8px; position: relative; top: -3px;">
                                            Day: 1 <i class="fa fa-chevron-up" style="color: red; position: relative; top: -3px;"></i> &nbsp;
                                            Day: 2 <i class="fa fa-chevron-down" style="color: green; position: relative; top: -4px;"></i></span>
                                        <p style="padding-left: 8px; margin-top: -5px;">Date quarantine start: <a><?= date('d, M - Y', strtotime($value_q->start_q)); ?></a> &nbsp; end: <a><?= date('d, M - Y', strtotime($value_q->end_q)); ?></a></p>
                                        <div class="fold-content">
                                            <div class="checklist2">
                                                <input type="hidden" name="url" value="<?= base_url(); ?>">
                                                <div class="table_wrapper">
                                                    <table width="100%" id="2nd_tbl chk-list">
                                                        <thead>
                                                            <tr id="first_tr" style="border-top: 1px solid rgba(0,0,0,0.5);">
                                                                <td class="text-center first_td" colspan="1" rowspan="2" width="10%" 
                                                                    style="font-weight: bold;background-color: rgba(1, 93, 214, 0.8) !important;color: #fff;text-transform: uppercase;">
                                                                    No. of Day
                                                                </td>
                                                                <th style="font-size: 20px;letter-spacing: 0.1rem;
                                                                    background-color: rgba(255, 0, 0, 0.5);color: #fff;" class="text-center" colspan="11">
                                                                    SYMPTOMS
                                                                </th>
                                                            </tr>
                                                            <tr style="padding: 4px 4px;text-align: center;letter-spacing: 0.06rem;
                                                                background-color: rgba(255, 230, 0, 0.7); border-top: 1px solid rgba(0,0,0,0.5);">
                                                                <td>Normal Temp</td>
                                                                <td>No Symptom</td>
                                                                <td>Fever (Temp)</td>
                                                                <td>Cough</td>
                                                                <td>Sore Throat</td>
                                                                <td>Difficulty Breathing</td>
                                                                <td>Runny Nose</td>
                                                                <td style="">Other Symptoms</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="lists" style="background-color: rgb(255, 255, 255); padding: 0px;">
                                                            <link rel="stylesheet" href="<?=base_url();?>source/custom/style.css">
                                                            <?php foreach($value->days as $row => $row_data): ?>             
                                                                <tr>
                                                                    <td id="1st">
                                                                        <table class="tbl_days" width="100%" id="days">
                                                                            <tr>
                                                                                <td  rowspan="2">
                                                                                    <?= $row_data->day; ?>
                                                                                </td>
                                                                                <td style="">AM</td>
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
                                                                                <?php foreach($row_data->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && substr($value->temp, 0, 2) < 38): ?>
                                                                                        <td style="position: relative; padding-left: 2px; z-index: 10" contenteditable=false 
                                                                                        id="1 normal-temp am" width="100%"><?=(substr($value->temp, 0, 2) < 38) ? $value->temp : '';?></td>
                                                                                    <?php else: ?>
                                                                                        <td style="text-align: center;padding: 3px 3px;outline: none !important;" contenteditable=true id="1 normal-temp pm"></td>
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
                                                                    <td>
                                                                        <table width="100%" id="symptoms">
                                                                            <tr>
                                                                                <?php foreach($row_data->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->am) && $value->symptoms == 'no-symptoms'): ?>
                                                                                        <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10;" align="center">                               
                                                                                            <div style="position: absolute; top: 2px; left: 4rem;" class="parent am toggle" id="1 no-symptoms am">
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
                                                                            <tr>
                                                                                <?php foreach($row_data->checklist as $key => $value): ?>                                  
                                                                                    <?php if(!empty($value->pm) && $value->symptoms == 'no-symptoms'): ?>
                                                                                        <td style="position: relative; left: 13px; z-index: 10;">                               
                                                                                            <div style="position: absolute; top: 2px; right: 4.5rem;" class="parent pm toggle" id="1 no-symptoms pm">
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
                                                                                                <div class="second-child" id="1 no-symptoms pm">
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
                                                                            <tr class='1 fever-temp' id="am"> 
                                                                                <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                <!-- cough -->
                                                                    <td>
                                                                    <table width="100%" id="symptoms" class="cough">
                                                                        <tr>
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
                                                                                <?php if(!empty($value->am) && $value->symptoms == 'runny-nose'): ?>
                                                                                    <td width="100%" style="position: relative; top: 0px; left: 0px; z-index: 10;" align="center">                               
                                                                                        <div style="position: absolute; top: 2px; left: 4rem;" class="parent am toggle" id="1 sore-throat am">
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                            <?php foreach($row_data->checklist as $key => $value): ?>                                  
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
                                                                <?php endforeach; ?>
                                                            </tr>
                                                        </tbody> 
                                                    </table>
                                                </div>
                                            </div>
            </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?> 
                        <?php endif; ?>  
                    </tbody>
                </table>
                <script>
                    $(document).find(".fold-table tr.view").on("click", function(){
                        $(this).toggleClass("open").next(".fold").toggleClass("open");
                    });
                </script>
            </div>
        </div>
    </div>
</div>