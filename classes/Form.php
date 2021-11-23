<?php

class Form
{
    public function create($action, $method='post') {
        return "<form action='".$action."' method='".$method."'>";
    }

    public function end() {
        return "</form>";
    }

    public function input($name, $value='', $placeholder='') {
        return "<input type='text' name='".$name."' value='".$value."' placeholder='".$placeholder."'/>";
    }

    public function select ($name, $array_option, $label='') {
        $text_to_return = $label ." <select name='".$name."'>" ;
        foreach ($array_option as $key => $value) {
            $text_to_return .= "<option value='".$key."'>".$value."</option>";
        }

        $text_to_return .= "</select>";

        return $text_to_return;
    }

    public function textarea($name, $value='') {
        return "<textarea name='".$name."'>".$value."</textarea>";
    }

    public function radio($name, $value, $label) {
        return " <input type='radio' name='".$name."' value='".$value."' /> ".$label;
    }

    public function checkbox($name, $label) {
        return " <input type='checkbox' name='".$name."'/> ".$label;
    }

    public function submit($value) {
        return " <input type='submit' value='".$value."'/> ";
    }

    public function breakLine() {
        return "<br/>";
    }
}