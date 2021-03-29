
<div class="container pum-lists" >
<?php if(!empty($count)): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"
                style="border: 1px solid rgba(0, 0, 0, 0.4); position: relative;">
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
    <input type="hidden" name="url" value="<?= base_url(); ?>">
    <br>
    Below are the lists of PUM/PUI
    <table class="table fold-table" id="dt">
        <thead>
            <tr>
                <td>PUM CODE</td>
                <td>START DATE QUARANTINE</td>
                <td>END DATE QUARANTINE</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- <table class="table fold-table" id="dt">
        <thead>
            <tr>
                <td>PUM CODE</td>
                <td>START DATE QUARANTINE</td>
                <td>END DATE QUARANTINE</td>
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
                        <td><?= date('D d, F - Y', strtotime($value_q->start_q)); ?></td>
                        <td><?= date('D d, F - Y', strtotime($value_q->end_q)); ?></td>
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
                                                <table>
                                                    <tr>
                                                        <td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); text-align: center;">AM</td>
                                                        <td width="30%">
                                                            <table>
                                                                <?php foreach ($result->day_am as $key => $day_am):?>
                                                                    <tr>
                                                                        <td width="30.5%"><?= $day_am->temp; ?></td>
                                                                        <td width="29.5%"><?= $day_am->symptoms; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid rgba(0,0,0, 0.5);">
                                                        <td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); text-align: center;">PM</td>
                                                        <td width="30%">
                                                            <table>
                                                                <?php foreach ($result->day_pm as $key => $day_pm):?>
                                                                    <tr>
                                                                        <td width="30.5%"><?= $day_pm->temp; ?></td>
                                                                        <td width="29.5%"><?= $day_pm->symptoms; ?></td>
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
    </table> -->
</div>
<!-- <script>
    $(document).on('click', 'tr.view', function(){
        $.ajax({
            url: $('input[name="url"]').val() + 'user/getPUM_result',
            type: 'post',
            data : {
                id : $(this).attr('id'),
                action : 'get'
            },
            success:function(data){
                const log_oObj = JSON.parse(data);
                var html = '', days = [], nd = '';
                console.log(log_oObj);
                // $.each(log_oObj, function(i, value){
                //     html += '<tr style="border-top: 1px solid rgba(0,0,0, 0.5);">';
                //     html +=     '<td width="20%" style="border-right: 1px solid rgba(0,0,0, 0.5); text-align: center;">'+ value.day +'</td>';
                //     html +=     '<td colspan="3" style="padding: 0px;">';
                //     html +=         '<table>';
                //     html +=             '<tr>';
                //     html +=                 '<td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); text-align: center;">AM</td>';
                //     html +=                 '<td width="30%">';
                //     html +=                    '<table>';
                //                                 value.day_am.forEach(am => {
                //     html +=                       '<tr>';
                //     html +=                          '<td width="30.5%">'+ am['temp'] +'</td>';
                //     html +=                          '<td width="29.5%">'+ am['symptoms'] +'</td>';
                //     html +=                       '</tr>';
                //                                 });
                //     html +=                    '</table>'; 
                //     html +=                 '</td>';
                //     html +=             '</tr>';
                //     html +=             '<tr style="border-top: 1px solid rgba(0,0,0, 0.5);">';
                //     html +=                 '<td width="9.3%" style="border-right: 1px solid rgba(0,0,0,0.5); text-align: center;">PM</td>';
                //     html +=                 '<td width="30%">';
                //     html +=                    '<table>';
                //                                 value.day_pm.forEach(pm => {
                //     html +=                       '<tr>';
                //     html +=                          '<td width="30.5%">'+ pm['temp'] +'</td>';
                //     html +=                          '<td width="29.5%">'+ pm['symptoms'] +'</td>';
                //     html +=                       '</tr>';
                //                                 });
                //     html +=                    '</table>'; 
                //     html +=                 '</td>';
                //     html +=             '</tr>';
                //     html +=         '</table>'; 
                //     html +=     '</td>';
                //     html += '</tr>';
                // });
                html +=     '<td width="20%" style="border-right: 1px solid rgba(0,0,0, 0.5);"></td>';
                    html +=     '<td colspan="3">';
                    html +=         '<table>';
                    html +=             '<tr>';
                    html +=                 '<td width="20%"></td>';
                    html +=                 '<td width="30%"></td>';
                    html +=                 '<td width="30%"></td>';
                    html +=             '</tr>';
                    html +=             '<tr style="border-top: 1px solid rgba(0,0,0, 0.5);">';
                    html +=                 '<td width="20%"></td>';
                    html +=                 '<td width="30%"></td>';
                    html +=                 '<td width="30%"></td>';
                    html +=             '</tr>';
                    html +=         '</table>'; 
                    html +=     '</td>';
                    html += '</tr>';
                $('#2nd_tbl').find('#lists').html(html);
            }
        });
    });
</script> -->

