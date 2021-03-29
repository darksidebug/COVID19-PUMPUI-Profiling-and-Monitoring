
                                            <!-- <table width="100%" id="2nd_tbl">
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
                                                    <?php endforeach; ?> -->
                                                