            <!-- day 9 -->
                <tr>
                    <td>
                        <table width="100%" id="days">
                            <tr>
                                <td rowspan="2">9</td>
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
                            <tr class='9 normal-temp' id="am"> 
                                <td contenteditable=true id="9 normal-temp pm"></td>                          
                            </tr>
                            <tr class='9 normal-temp' id="pm">                                         
                                <td contenteditable=true id="9 normal-temp pm"></td>                                 
                            </tr>
                        </table>
                    </td>
                <!-- no symptom -->
                    <td>
                        <table width="100%" id="symptoms" class="no_sysmptoms">
                            <tr>
                                <td>                               
                                    <div class="parent am" id="9 no-symptoms am">
                                        <div class="first-child am" id="9 no-symptoms am">
                                            <input type="checkbox" name="am_tbl_chk[]" id="9 no-symptoms am">
                                        </div>
                                        <div class="second-child" id="9 no-symptoms am">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 no-symptoms pm">
                                        <div class="first-child pm" id="9 no-symptoms pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 no-symptoms pm">
                                        </div>
                                        <div class="second-child" id="9 no-symptoms pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                <!-- fever -->
                    <td>
                        <table width="100%" id="symptoms"> 
                            <tr class='9 fever-temp' id="am"> 
                                <td contenteditable=true id="9 fever-temp pm"></td>                          
                            </tr>
                            <tr class='9 fever-temp' id="pm">                                         
                                <td contenteditable=true id="9 fever-temp pm"></td>                                
                            </tr>
                        </table>
                    </td>
                <!-- cough -->
                    <td>
                        <table width="100%" id="symptoms" class="cough">
                            <tr>
                                <td>                               
                                    <div class="parent am" id="9 cough am">
                                        <div class="first-child am" id="9 cough am">
                                            <input type="checkbox" name="am_tbl_chk[]" id="9 cough am">
                                        </div>
                                        <div class="second-child" id="9 cough am">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 cough pm" >
                                        <div class="first-child pm" id="9 cough pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 cough pm">
                                        </div>
                                        <div class="second-child" id="9 cough pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                <!-- sore throat -->
                    <td>
                        <table width="100%" id="symptoms">
                            <tr>
                                <td>                               
                                    <div class="parent am" id="9 sore-throat am">
                                        <div class="first-child am" id="9 sore-throat am">
                                            <input type="checkbox" name="am_tbl_chk[]" id="9 sore-throat am">
                                        </div>
                                        <div class="second-child" id="2 sore-throat am">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 sore-throat pm">
                                        <div class="first-child pm" id="9 sore-throat pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 sore-throat pm">
                                        </div>
                                        <div class="second-child" id="9 sore-throat pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                <!-- breathing -->
                    <td>
                        <table width="100%" id="symptoms">
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 difficulty-breathing pm">
                                        <div class="first-child pm" id="9 difficulty-breathing pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 difficulty-breathing pm">
                                        </div>
                                        <div class="second-child" id="9 difficulty-breathing pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 difficulty-breathing pm">
                                        <div class="first-child pm" id="9 difficulty-breathing pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 difficulty-breathing pm">
                                        </div>
                                        <div class="second-child" id="9 difficulty-breathing pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                <!-- runny nose -->
                    <td>
                        <table width="100%" id="symptoms"> 
                            <tr>
                                <td>                               
                                    <div class="parent am" id="9 runny-nose am">
                                        <div class="first-child am" id="9 runny-nose am">
                                            <input type="checkbox" name="am_tbl_chk[]" id="9 runny-nose am">
                                        </div>
                                        <div class="second-child" id="9 runny-nose am">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>                               
                                    <div class="parent pm" id="9 runny-nose pm">
                                        <div class="first-child pm" id="9 runny-nose pm">
                                            <input type="checkbox" name="pm_tbl_chk[]" id="9 runny-nose pm">
                                        </div>
                                        <div class="second-child" id="9 runny-nose pm">
                                            <img id="" src="<?= base_url(); ?>source/img/check.png" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- other symptoms -->
                    <td>
                        <table width="100%" id="symptoms"> 
                            <tr class='9 other-symptoms' id="am"> 
                                <td style="" contenteditable=true id="9 other-symptoms pm"></td>                           
                            </tr>
                            <tr class='9 other-symptoms' id="pm">                                         
                                <td style="border-top: 1px solid rgba(0, 0, 0, 0.5);" contenteditable=true id="9 other-symptoms pm"></td>                                
                            </tr>
                        </table>
                    </td>
                </tr>