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