<?php 
    require('./libs/config.php');
    require('./libs/common_functions.php');
    include('header.php'); 
    $officeId = $_GET['officeId'];
?>
<script>
    function getAnswer(){
        var answer_json = {};
        var groups = $("[name^='group_']:checked");
        answer_json['office_id'] = $("#office_id").val();
        // answer_json['complaint'] = $("#complaint").val();
        answer_json['answer_list'] = [];

        $(groups).each(function(index){
            var group = $(this);
            var group_name = $(group).attr('name');
            var checked_element = $('[name='+group_name+']:checked');
            // extra field
            var checked_element_id = $(checked_element).attr('id');
            var sub_element = $("#sub_"+checked_element_id);
            // push answer object 
            answer_json['answer_list'].push({
                'question_id': $(checked_element).data('question-id'),
                'answer_id': $(checked_element).data('option-id'),
                'extra_field': ($(sub_element).length > 0)?$(sub_element).val():null
            });
        });
        answer_json['answer_list'].push({
            'question_id': $("#complaint").data('question-id'),
            'answer_id': $("#complaint").data('option-id'),
            'extra_field': $("#complaint").val(),
        })
        return answer_json;
    }
    $(function(){
        $("form").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: 'submit_survey.php',
                type: 'POST',
                data: {
                    answer: getAnswer()
                },
                async: true,
                // cache: false,
                // contentType: false,
                // processData: false,
                beforeSend: function(){
                    $.blockUI({message: 'กรุณารอสักครู่'});
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(response){
                    console.log('[error]', response);
                },
                complete: function() {
                    $.unblockUI();
                    swal("สำเร็จ", "บันทึกความพึงพอใจในระบบเรียบร้อยแล้ว", "success")
                    .then(function(){
                        location.reload();
                    })
                }
            });
            return false;
        });
        $("[name^='group_']:radio").click(function(){
            var element_id = $(this).attr('id');
            var group_name = $(this).attr('name');
            var sub_element = $("#sub_"+element_id);
            if($(sub_element).length > 0){
                $(sub_element).attr('required','required');
                $(sub_element).show();
            } else {
                var sub_element_list = $(this).parent().parent().find('.ui-input-text').children();
                if($(sub_element_list).length > 0){
                    var sub_element = sub_element_list[0];
                    $(sub_element).removeAttr('required');
                    $(sub_element).hide();
                }
            }
        });
    });
</script>
<div data-role="page">
    <div>
        <br/>
        <?php 
            $fetch_office = "SELECT * FROM TBL_OFFICE WHERE OFFICE_STATUS = 'A' AND OFFICE_ID = '$officeId'";
            $office_result = mysqli_query($conn, $fetch_office) or die(mysqli_error());
            $office = $office_result->fetch_assoc();
        ?>
        <img style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="./images/logo-PEA.png" />
        <h2 style="text-align:center">แบบสอบถามความพึงพอใจบริการการให้บริการประจำ <?=$office['office_name'] ?></h2>
    </div>
	<div role="main" class="ui-content">
        <div data-role="collapsible" data-theme="b" data-content-theme="b" data-collapsed="false">
            <h3><u>คำชี้แจง</u></h3>
            แบบสอบถามนี้จัดทำขึ้นเพื่อรวบรวมข้อมูลความพึงพอใจของท่าน และความคิดเห็นต่อในการให้บริการของการไฟฟ้าส่วนภูมิภาค โดยการประเมินของท่านจะมีประโยชน์ต่อการพัฒนาปรับปรุงให้มีประสิทธิภาพต่อไป
            <br/><hr/> <b>โดยสัญลักษณ์ <span style="color:red;">*</span> หมายความว่าต้องตอบคำถามนั้น</b>
        </div>
        <!-- surveys -->
        <form name="survey-form" id="survey-form" method='POST'>
            <input type="hidden" name="office_id" id="office_id" value="<?=$office['office_id'] ?>" />
            <div>

            </div>
            <?php
                // setting element and group id 
                $group_id = 0;
                $element_id = 0;

                $fetch_question_type = 'SELECT type_id, type_name, type_order FROM TBL_SURVEY_TYPE WHERE TYPE_STATUS="A" ORDER BY TYPE_ORDER ASC';
                $type_result = mysqli_query($conn, $fetch_question_type) or die(mysqli_error($conn));
                while($type_row = $type_result->fetch_assoc()){  
            ?>
            <div class="ui-corner-all custom-corners">
                <div class="ui-bar ui-bar-a">
                    ส่วนที่ <?=$type_row['type_order']." ".$type_row['type_name'] ?>
                </div>
                <div class="ui-body ui-body-a">
                <?php
                    $type_id = $type_row['type_id'];
                    $fetch_question = "SELECT question_id, question, answer_type, is_required FROM TBL_SURVEY_QUESTION ".
                                        "WHERE QUESTION_STATUS = 'A' AND TYPE_ID = $type_id ".
                                        "ORDER BY QUESTION_ORDER ASC";
                    $question_result = mysqli_query($conn, $fetch_question) or die(mysqli_error($conn));
                    while($quest = $question_result->fetch_assoc()){
                        $question_id = $quest['question_id'];
                        $question = $quest['question'];
                        $star_required = $quest['is_required']?'<span style="color:red;">*</span>':'';
                        $question = "$question_id. $question $star_required";
                ?>
                    <h2><b><?= $question; ?></b></h2>
                    <?php
                        $question_id = $quest['question_id'];
                        $fetch_option = "SELECT option_id, option_text, extra_field FROM TBL_SURVEY_ANSWER ".
                                        "WHERE OPTION_STATUS = 'A' AND QUESTION_ID = $question_id ".
                                        "ORDER BY OPTION_ORDER ASC";
                        $option_result = mysqli_query($conn, $fetch_option) or die(mysqli_error($conn));

                        $html_option = "";
                        if($quest['answer_type'] == "option"){
                            $html_option = "<fieldset>";
                            while($option = $option_result->fetch_assoc()){
                                $option_id = $option['option_id'];
                                $option_text = $option['option_text'];
                                $extra_field = $option['extra_field'];
                                $required = $quest['is_required']?'required':'';
                                $html_option .= "<label for='element_$element_id'>$option_text</label>";
                                $html_option .= "<input type='radio' name='group_$group_id' data-question-id='$question_id' data-option-id='$option_id' data-extra-field='$extra_field' id='element_$element_id' value='$option_id' $required>";
                                if($extra_field == "Y"){
                                    $html_option .= "<input type='text' name='sub_element_$element_id' id='sub_element_$element_id' data-question-id='$question_id' data-option-id='$option_id' id='element_$element_id' style='display:none;'/>";
                                }
                                $element_id++;
                            }
                            $group_id++;
                            $html_option .= "<fieldset>";
                        }else if($quest['answer_type'] == "text"){
                            $option = $option_result->fetch_assoc();$option_id = $option['option_id'];
                            $html_option = "<textarea name='complaint' id='complaint' data-question-id='$question_id' data-option-id='$option_id' cols='30' rows='10' placholder='ความคิดเห็นหรือข้อเสนอแนะเพิ่มเติม'></textarea>";
                        }
                    ?>
                    <?=$html_option ?>
                <?php 
                    }
                ?>
                </div>
            </div>
            <?php 
                }
            ?>
            <button type="submit" name="submit-btn" class="ui-btn ui-icon-check ui-btn-icon-top" value="ส่งความพึงพอใจ" class="btn-link">ส่งความพึงพอใจ</button>
            <button type="reset" name="reset-btn" class="ui-btn ui-icon-delete ui-btn-icon-top">ลบคำตอบ</button>
        </form>
        <!-- surveys -->
    </div>
	<div data-role="footer">
        <h4>Copyright 2018</h4>
    </div>
</div>
<?php include('footer.php'); ?>