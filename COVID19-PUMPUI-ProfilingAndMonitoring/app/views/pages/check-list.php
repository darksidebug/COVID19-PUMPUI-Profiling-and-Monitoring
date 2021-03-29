<div class="container checklist">
    <h4 class="text-center">SYMPTOM's CHECKING: (Please check daily)</h4>
    <input type="hidden" name="url" value="<?= base_url(); ?>">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col">
            <div class="form-group">
                <label for="">Select Day:</label>
                <select name="day" id="" class="form-control">
                    <option value="">Select Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select AM/PM:</label>
                <select name="am_pm" id="" class="form-control">
                    <option value="">Select AM/PM</option>
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select Symptoms:</label>
                <select name="symptoms" id="" class="form-control">
                    <option value="">Select Symptoms</option>
                    <option value="no-symptoms">No Symptom</option>
                    <option value="fever">Fever</option>
                    <option value="cough">Cough</option>
                    <option value="sore-throat">Sore Throat</option>
                    <option value="difficulty-breathing">Shortness/Difficulty Breathing</option>
                    <option value="runny-nose">Runny Nose</option>
                    <option value="other symptoms">Other Symptoms</option>
                </select>
            </div>
            <div class="form-group">
                <label id="txt_other">Temperature:</label>
                <input type="text" name="temp" id="other" class="form-control" placeholder="Temperature">
            </div>
            <div class="form-group" id="other_display" style="display: none; position: relative; top: -10px;">
                <label>If Other Symptoms selected: (Pls. specify)</label>
                <input type="text" name="specify" id="specify" class="form-control" placeholder="Enter symptoms">
            </div>
            <div class="row">                
                <div class="form-group" align="center">
                    <button id="record" class="btn btn-primary"><i class="fa fa-save"></i> SAVE</button>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center" style="margin-top: 20px;">&copy 2020 - All Rights Reserved</p>
    <p class="text-center" style="margin-top: -5px; margin-bottom: 20px;">Developed by: Benigno Entera Ambus Jr.</p>
</div>
    <!-- <h4 class="text-center">SYMPTOM DIARY/CHECK LIST: (Please check accordingly)</h4>-->

    
                
    
    