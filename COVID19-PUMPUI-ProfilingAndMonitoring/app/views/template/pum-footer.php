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
                                        
                                        <p style="padding-left: 8px; margin-top: -5px;">Date quarantine start: <a><?= date('d, M - Y', strtotime($value_q->start_q)); ?></a> &nbsp; end: <a><?= date('d, M - Y', strtotime($value_q->end_q)); ?></a></p>
                                        <span style="padding-left: 8px; position: relative; top: -4px;">
                                            Day: 1 <i class="fa fa-chevron-up" style="color: red; position: relative; top: -3px;"></i> &nbsp;
                                            Day: 2 <i class="fa fa-chevron-down" style="color: green; position: relative; top: -4px;"></i>
                                        </span>
                                        <div class="fold-content">
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