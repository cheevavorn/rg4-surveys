<?php
    function createOptionHTML($options, $is_required){
        $html_option = "<fieldset>";
        while($option = $options->fetch_assoc()){
            $html_option .= '<input type="radio" name="group_3" id="radio-choice-7" value="choice-1" required> ';
        }
        $html_option .= "<fieldset>";
        return $html_option;
    }

    function createTextField($options, $is_required){

    }