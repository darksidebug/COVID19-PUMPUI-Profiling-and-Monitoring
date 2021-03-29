$('#dt').DataTable();
/*
*
* ----------------------------------------------------------------------------
* Codes below is for the accordion table
* ----------------------------------------------------------------------------
* The code run on JQuery..
* Important Note: "Do not change the code unless you know how the codes work 
* or you are stupid enough to do so."
*
*/

$(document).find(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
});

/*
* -------------------------------------------------------------------
* End of code for accordion table
* -------------------------------------------------------------------
*/

/*
*
* ----------------------------------------------------------------------------
* Codes below is for the sign-in
* ----------------------------------------------------------------------------
* The code run on JQuery Ajax..
* Important Note: "Do not change the code unless you know how the codes work 
* or you are stupid enough to do so."
*
*/

/*
* -------------------------------------------------------------------
* End of code for sign-in
* -------------------------------------------------------------------
*/


/*
*
* ----------------------------------------------------------------------------
* Codes below is for the checklist
* ----------------------------------------------------------------------------
* Important Note: "Do not change the code unless you know how the codes work 
* or you are stupid enough to do so."
*
*/

// var _no_symptom = 'allow', _tempID_symptoms = '', _prev_date = 0, _ampm_based = '';
// window.onclick = function(e){

//     var _normal_tempText = '', _fever_tempText = '', _othr_sympText = '';
//     var _date_now        = ($('input[name="date"]').val() < 10 ? $('input[name="date"]').val().replace('0', '') : $('input[name="date"]').val());
//     var _class           = e.target.className;
//     var _date            = $(e.target).attr('id').substring(0, 1);

//     var _chk_symptomID  = $(e.target).attr('id').substring(2, $(e.target).attr('id').length - 3);
//     var _ampm_symptomID = $(e.target).attr('id').substring($(e.target).attr('id').length, _chk_symptomID.length + 3);

//     $(document).on('blur', 'tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]',
//     function(){
//         if($(this).text().substring(0, 2) >= 38 && $(this).text() != ''){
//             alert('You have exceeded the normal temperature.');
//             $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html($(this).html());
//             $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html();
//             $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html('');
//         }
//     });

//     $(document).on('blur', 'tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]',
//     function(){
//         if($(this).text().substring(0, 2) < 38 && $(this).text() != ''){
//             alert('You have mistakenly inputed a temperature on the wrong column.');
//             $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html($(this).html());
//             $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').focus();
//             $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html('');
//         }
//     });

//     _normal_tempText = $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html();
//     _fever_tempText  = $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').html();
//     _othr_sympText   = $('tr.'+ _date +'.other-symptoms#'+ _ampm_symptomID +' > td[contenteditable=true]').html();
    
//     var am = '', pm = '';

//     if(_date <= _date_now.replace('2', '')){
        
//         if(_chk_symptomID == 'no-symptoms'){
//             // this.alert(_no_symptom);
//             // this.alert(_no_symptom + _date +"-"+ _prev_date);
//             if(_date >= _prev_date){
//                 if(_no_symptom == 'allow'){
//                     _no_symptom = 'checked';
//                     _tempID_symptoms = '';
//                     // this.alert(_no_symptom);
//                 }
//             }

//             if(_normal_tempText != "" && _no_symptom == 'checked'){
//                 // this.alert(_no_symptom);
//                 if(_tempID_symptoms == ""){

//                     _prev_date = $(e.target).attr('id').substring(0, 1);
//                     _ampm_based = $(e.target).attr('id').substring($(e.target).attr('id').length, _chk_symptomID.length + 3);

//                     if(_class == "first-child am" || _class == "first-child pm"){

//                         $(e.target).parent().addClass('toggle'); 
//                         $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').text(''); 
                        
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_insert(data, _no_symptom);
//                     }
//                     else if(_class == ""){

//                         $(e.target).parent().parent().removeClass('toggle');
//                         _no_symptom = 'allow';
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_delete(data, _no_symptom);
//                     }
//                     else if(_class == "parent am toggle" || _class == "parent pm togle"){

//                         $(e.target).removeClass('toggle');
//                         _no_symptom = 'allow';
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_delete(data, _no_symptom);
//                     }
//                 }
//                 // else{
//                 //     this.alert(_tempID_symptoms);
//                 // }
//             }
//             else{
//                 this.alert('  Your normal temperature is highly needed. Please input correctly according to the date today.');
//             }
//         }
//         else if(_chk_symptomID == 'cough' || _chk_symptomID == 'sore-throat' || _chk_symptomID == 'difficulty-breathing' || 
//             _chk_symptomID == 'runny-nose'){ 
//                 var _newDate = $(e.target).attr('id').substring(0, 1);
//                 // this.alert(_ampm_based + " " + _ampm_symptomID);
//                 // this.alert(_no_symptom + " " + _newDate +"-"+ _prev_date);
            
//             if((_newDate > _prev_date) && (_ampm_based != _ampm_symptomID || _ampm_based == _ampm_symptomID)){
//                 if(_no_symptom == 'checked'){
//                     _no_symptom = 'allow';
//                     // this.alert(_no_symptom + " ampm base != ||");
//                 }
//             }
//             else if((_newDate == _prev_date) && (_ampm_based != _ampm_symptomID)){
//                 if(_no_symptom == 'checked'){
//                     _no_symptom = 'allow';
//                     // this.alert(_no_symptom + "  ampm !=");
//                 }
//             }
//             else if((_newDate == _prev_date) && (_ampm_based == _ampm_symptomID)){
//                 _no_symptom = 'checked'
//                 // this.alert(_no_symptom);
//             }
            
//             if(_normal_tempText != "" || _fever_tempText != ""){
//                 var temp = (_normal_tempText != '' ? _normal_tempText : _fever_tempText);
                
//                 if(_no_symptom == 'allow'){

//                     if(_class == "first-child am" || _class == "first-child pm"){

//                         $(e.target).parent().addClass('toggle'); 
//                         _no_symptom = 'allow'; 
//                         _tempID_symptoms += _chk_symptomID;
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_insert(data, _no_symptom);
//                     }
//                     else if(_class == ""){

//                         $(e.target).parent().parent().removeClass('toggle');
//                         _tempID_symptoms = _tempID_symptoms.replace(_chk_symptomID, '');
//                         // if(_tempID_symptoms == ''){

//                         //     $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').text('');
//                         //     $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').text('');  
//                         // }
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_delete(data, _no_symptom);
//                     }
//                     else if(_class == "parent am toggle" || _class == "parent pm togle"){

//                         $(e.target).removeClass('toggle');
//                         _tempID_symptoms = _tempID_symptoms.replace(_chk_symptomID, '');
//                         // if(_tempID_symptoms == ''){

//                         //     $('tr.'+ _date +'.normal-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').text('');
//                         //     $('tr.'+ _date +'.fever-temp#'+ _ampm_symptomID +' > td[contenteditable=true]').text('');
//                         // }
//                         if(_ampm_symptomID == 'am'){
//                             am = 'am';
//                         }
//                         else if(_ampm_symptomID == 'pm'){
//                             pm = 'pm';
//                         }
//                         var data = {
//                             temp: temp,
//                             date: _date,
//                             symptom : _chk_symptomID,
//                             am: am,
//                             pm : pm,
//                             action : 'insert'
//                         }
//                         call_ajax_delete(data, _no_symptom);
//                     }
//                 } 
//             }
//             else{
//                 this.alert('  Your temperature is highly needed either normal or fever. Please input correctly according to the date today.');
//             }
//             return false;
//         }
//         return false;
//     }
    
// }

// function call_ajax_insert(data, symptoms){
//     _no_symptom = (_no_symptom != '' ? '' : '');
//     alert('Processing ....... saving .....');
//     $.ajax({
//         url : $('input[name="url"]').val()+'user/check_list',
//         type: 'POST',
//         data: data,
//         success:function(data){
//             const log_oObj = JSON.parse(data);
//             console.log(log_oObj);
//             if(log_oObj.login == true){
//                 if(symptoms != 'no-symptoms'){
//                     _no_symptom = 'allow';
//                 }
//                 else{
//                     _no_symptom = 'checked';
//                 }
//                 alert(log_oObj.message);
//                 // window.location.href = $('input[name="url"]').val() + 'pages/view/check-list';
//             }else{
//                 alert(log_oObj.message);
//             }
//         }
//     });
// }

// function call_ajax_delete(data, symptoms){
//     _no_symptom = (_no_symptom != '' ? '' : '');
//     if(confirm('Are you sure you want to remove this record?') == true){
//         $.ajax({
//             url : $('input[name="url"]').val()+'user/delete_chk_list',
//             type: 'POST',
//             data: data,
//             success:function(data){
//                 const log_oObj = JSON.parse(data);
//                 console.log(log_oObj);
//                 if(log_oObj.login == true){
//                     if(symptoms != 'no-symptoms'){
//                         _no_symptom = 'allow';
//                     }
//                     else{
//                         _no_symptom = 'checked';
//                     }
//                     alert(log_oObj.message);
//                     window.location.href = $('input[name="url"]').val() + 'pages/view/check-list';
//                 }else{
//                     alert(log_oObj.message);
//                 }
//             }
//         });
//     }
// }

/*
* -------------------------------------------------------------------
* End of code for check list
* -------------------------------------------------------------------
*/


$(document).on('change', 'select[name="symptoms"]', function(){
    if($(this).val() != ''){
        if($(this).val() == 'no-symptoms'){
            $('label#txt_other').text('Normal Temp: (below 38 Deg. Celcius)');
            $('input[name="other"]').attr('placeholder', 'Enter temperature');
        }
        else if($(this).val() == 'other-symptoms'){
            $('label#txt_other').text('Enter temperature:');
            $('input[name="other"]').attr('placeholder', 'Enter temperature');
            document.getElementById('other_display').style.display = 'inline';
        }
        else if($(this).val() == 'fever'){
            $('label#txt_other').text('Fever Temp: (above 38 Deg. Celcius)');
            $('input[name="other"]').attr('placeholder', 'Enter temperature');
        }
        else{
            $('label#txt_other').text('Enter temperature:');
            $('input[name="other"]').attr('placeholder', 'Enter temperature');
        }
    }
});

function save_chkList(data){
    $.ajax({
        url: $('input[name="url"]').val() + 'user/check_list',
        type: 'POST',
        data: data,
        success:function(data){
            const log_oObj = JSON.parse(data);
            console.log(log_oObj);
            if(log_oObj.login == true){
                alert(log_oObj.message);
            }else{
                alert(log_oObj.message);
            }
        }
    });
}

var am = '', pm = '';
$(document).on('click', '#record', function(){ 
    if($('select[name="day"]').val() != '' && $('select[name="am_pm"]').val() != '' && 
        $('select[name="symptoms"]').val() != '' && $('input[name="temp"]').val() != ''){

        if($('select[name="symptoms"]').val() == 'other-symptoms'){
            if($('input[name="specify"]').val() != ''){
                if($('input[name="am_pm"]').val() == 'am'){
                    am = 'am';
                }
                else if($('input[name="am_pm"]').val() == 'pm'){
                    pm = 'pm';
                }
                var data = {
                    am: am,
                    pm: pm,
                    date: $('select[name="day"]').val(),
                    temp: $('input[name="temp"]').val(),
                    symptoms: $('input[name="specify"]').val(),
                    action: 'insert'
                }
                save_chkList(data);
            }
            else{
                alert('All fields are required.');
            }
        }
        else if($('select[name="symptoms"]').val() == 'fever'){
            if($('input[name="temp"]').val().substring(0, 2) < 38){
                alert("Your temperature seems to be lower than the fever temperature. Please input a valid fever temperature.");
            }
            else{
                if($('select[name="am_pm"]').val() == 'am'){
                    am = 'am';
                }
                else if($('select[name="am_pm"]').val() == 'pm'){
                    pm = 'pm';
                }
                var data = {
                    am: am,
                    pm: pm,
                    date: $('select[name="day"]').val(),
                    temp: $('input[name="temp"]').val(),
                    symptoms: $('select[name="symptoms"]').val(),
                    action: 'insert'
                }
                save_chkList(data);
            }
        }
        else{
            if($('select[name="am_pm"]').val() == 'am'){
                am = 'am';
            }
            else if($('select[name="am_pm"]').val() == 'pm'){
                pm = 'pm';
            }
            var data = {
                am: am,
                pm: pm,
                date: $('select[name="day"]').val(),
                temp: $('input[name="temp"]').val(),
                symptoms: $('select[name="symptoms"]').val(),
                action: 'insert'
            }
            save_chkList(data);
        }
    }
    else{
        alert('All fields are required.');
    }
});

// $(document).on('click', 'tr.view', function(){
//     $.ajax({
//         url: $('input[name="url"]').val() + 'user/getPUM_result',
//         type: 'post',
//         data : {
//             id : $('input[name="id"]').val(),
//             action : 'get'
//         },
//         success:function(data){
//             const log_oObj = JSON.parse(data);
//             console.log(log_oObj);
//             var html = '';
//             $.each(log_oObj, function(i, value){
//                 html += '<tr style="border-top: 1px solid rgba(0,0,0, 0.5);">';
//                 $.each(value.day, function(j, days){
                    // html +=     '<td width="20%" style="border-right: 1px solid rgba(0,0,0, 0.5);"><?= $value->day; ?></td>';
                    // html +=     '<td colspan="3">';
                    // html +=         '<table>';
                    // html +=             '<tr>';
                    // html +=                 '<td width="20%"><?= $data->am; ?></td>';
                    // html +=                 '<td width="30%"><?= $data->temp; ?></td>';
                    // html +=                 '<td width="30%"><?= $data->symptoms; ?></td>';
                    // html +=             '</tr>';
                    // html +=             '<tr style="border-top: 1px solid rgba(0,0,0, 0.5);">';
                    // html +=                 '<td width="20%"><?= $data->pm; ?></td>';
                    // html +=                 '<td width="30%"><?= $data->temp; ?></td>';
                    // html +=                 '<td width="30%"><?= $data->symptoms; ?></td>';
                    // html +=             '</tr>';
                    // html +=         '</table>'; 
                    // html +=     '</td>';
                    // html += '</tr>';
//                 });
//             }); 
//         }
//     });
// })