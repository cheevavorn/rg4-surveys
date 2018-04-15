<?php include('header.php'); ?>
<script>
    function onSubmit(){
        document.forms[0].submit();
    }
</script>
<div data-role="page">
    <div data-role="header">
        <h1 style="font-size:18px">แบบสอบถามความพึงพอใจบริการ<br/>ของการไฟฟ้าส่วนภูมิภาค</h1>
    </div>
	<div role="main" class="ui-content">
        <div data-role="collapsible" data-theme="b" data-content-theme="b" data-collapsed="false">
            <h3><u>คำชี้แจง</u></h3>
            แบบสอบถามนี้จัดทำขึ้นเพื่อรวบรวมข้อมูลความพึงพอใจของท่าน และความคิดเห็นต่อในการให้บริการของการไฟฟ้าส่วนภูมิภาค โดยการประเมินของท่านจะมีประโยชน์ต่อการพัฒนาปรับปรุงให้มีประสิทธิภาพต่อไป
            <br/><br/> <b>โดยสัญลักษณ์ <span style="color:red;">*</span> หมายความว่าต้องตอบคำถามนั้น</b>
        </div>
        <!-- surveys -->
        <form name="survey-form" id="survey-form" method='post' action='#!'>
            <div class="ui-corner-all custom-corners">
                <div class="ui-bar ui-bar-a">
                    ส่วนที่ 1 ข้อมูลทั่วไปของผู้ตอบแบบสอบถาม
                </div>
                <div class="ui-body ui-body-a">
                    <h2><b>1. ประเภทของลูกค้า <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <label for="radio-choice-1">กลุ่มที่อยู่อาศัย</label>
                        <input type="radio" name="group_1" id="radio-choice-1" value="choice-1" required>

                        <label for="radio-choice-2">กลุ่มพาณิชย์</label>
                        <input type="radio" name="group_1" id="radio-choice-2" value="choice-2" required>
                
                        <label for="radio-choice-3">กลุ่มอุตสาหกรรม</label>
                        <input type="radio" name="group_1" id="radio-choice-3" value="choice-3" required>

                        <input type="radio" name="group_1" id="radio-choice-4" value="choice-4" required>
                        <label for="radio-choice-4">กลุ่มอื่นๆ โปรดระบุ</label><br/>
                        <input name="other-cust" id="other-cust" type="text"/>
                    </fieldset>
                    <hr />
                    <h2><b>2. สถานะผู้ตอบแบบสอบถาม <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <input type="radio" name="group_2" id="radio-choice-5" value="choice-5" required>
                        <label for="radio-choice-5">เจ้าของบ้าน/เจ้าของกิจการ</label>
                        <input type="radio" name="group_2" id="radio-choice-6" value="choice-6" required>
                        <label for="radio-choice-6">ผู้รับมอบอำนาจ/ผู้แทน</label>
                    </fieldset>
                </div>
            </div>
            <div class="ui-corner-all custom-corners">
                <div class="ui-bar ui-bar-a">
                    ส่วนที่ 2 ความพึงพอใจ/ความโปร่งใส ในการให้บริการของการไฟฟ้าส่วนภูมิภาค
                </div>
                <div class="ui-body ui-body-a">
                    <h2><b>1. ความสะดวกรวดเร็วของการให้บริการแต่ละขั้นตอน <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <input type="radio" name="group_3" id="radio-choice-7" value="choice-1" required> 
                        <label for="radio-choice-7">มากที่สุด(5)</label>
                        <input type="radio" name="group_3" id="radio-choice-8" value="choice-2" required>
                        <label for="radio-choice-8">มาก(4)</label>
                        <input type="radio" name="group_3" id="radio-choice-9" value="choice-3" required>
                        <label for="radio-choice-9">ปานกลาง(3)</label>
                        <input type="radio" name="group_3" id="radio-choice-10" value="choice-4" required>
                        <label for="radio-choice-10">น้อย(2)</label>
                        <input type="radio" name="group_3" id="radio-choice-11" value="choice-5" required>
                        <label for="radio-choice-11">น้อยที่สุด(1)</label>
                    </fieldset>
                    <hr />
                    <h2><b>2. มารยาทและความเอาใจใส่การให้บริการของพนักงาน <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <input type="radio" name="group_4" id="radio-choice-12" value="choice-1" required>
                        <label for="radio-choice-12">มากที่สุด(5)</label>
                        <input type="radio" name="group_4" id="radio-choice-13" value="choice-2" required>
                        <label for="radio-choice-13">มาก(4)</label>
                        <input type="radio" name="group_4" id="radio-choice-14" value="choice-3" required>
                        <label for="radio-choice-14">ปานกลาง(3)</label>
                        <input type="radio" name="group_4" id="radio-choice-15" value="choice-4" required>
                        <label for="radio-choice-15">น้อย(2)</label>
                        <input type="radio" name="group_4" id="radio-choice-16" value="choice-4" required>
                        <label for="radio-choice-16">น้อยที่สุด(1)</label>
                    </fieldset>
                    <hr />
                    <h2><b>3. มีการนำเทคโนโลยีต่างๆมาเพิ่มประสิทธิภาพการบริการ <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <input type="radio" name="group_5" id="radio-choice-17" value="choice-1" required>
                        <label for="radio-choice-17">มากที่สุด(5)</label>
                        <input type="radio" name="group_5" id="radio-choice-18" value="choice-2" required>
                        <label for="radio-choice-18">มาก(4)</label>
                        <input type="radio" name="group_5" id="radio-choice-19" value="choice-3" required>
                        <label for="radio-choice-19">ปานกลาง(3)</label>
                        <input type="radio" name="group_5" id="radio-choice-20" value="choice-4" required>
                        <label for="radio-choice-20">น้อย(2)</label>
                        <input type="radio" name="group_5" id="radio-choice-21" value="choice-4" required>
                        <label for="radio-choice-21">น้อยที่สุด(1)</label>
                    </fieldset>
                    <hr />
                    <h2><b>4. มีช่องทางหลากหลาย สะดวกในการติดต่อ/ร้องเรียน/เสนอแนะ <span style="color:red;">*</span></b></h2>
                    <fieldset>
                        <input type="radio" name="group_6" id="radio-choice-22" value="choice-1" required>
                        <label for="radio-choice-22">มากที่สุด(5)</label>
                        <input type="radio" name="group_6" id="radio-choice-23" value="choice-2" required>
                        <label for="radio-choice-23">มาก(4)</label>
                        <input type="radio" name="group_6" id="radio-choice-24" value="choice-3" required>
                        <label for="radio-choice-24">ปานกลาง(3)</label>
                        <input type="radio" name="group_6" id="radio-choice-25" value="choice-4" required>
                        <label for="radio-choice-25">น้อย(2)</label>
                        <input type="radio" name="group_6" id="radio-choice-26" value="choice-4" required>
                        <label for="radio-choice-26">น้อยที่สุด(1)</label>
                    </fieldset>
                </div>
            </div>
            <div class="ui-corner-all custom-corners">
                <div class="ui-bar ui-bar-a">
                    ส่วนที่ 3 ข้อเสนอแนะเพิ่มเติม
                </div>
                <div class="ui-body ui-body-a">
                    <textarea name="complaint" id="complaint" cols="30" rows="10" placholder="ความคิดเห็นหรือข้อเสนอแนะเพิ่มเติม"></textarea>
                </div>
            </div>
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