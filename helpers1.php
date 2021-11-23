<?php
//Un bouton submit <button type="submit"></button>
//Une checkbox <input type="checkbox">

class Form {
    public function create($action, $method) {
        return "<form action='".$action."' method='".$method."'>";
    }

    public function end() {
        return "</form>";
    }

    public function input($name, $value) {
        return "<input type='text' name='".$name."' value='".$value."'/>";
    }

    public function select ($name, $array_option) {
        $text_to_return = "<select name='".$name."'>" ;
        foreach ($array_option as $key => $value) {
            $text_to_return .= "<option value='".$key."'>".$value."</option>";
        }

        $text_to_return .= "</select>";

        return $text_to_return;
    }

    public function textarea($name, $value) {
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
$nom="nom du gars";
$prenom="prénom du gars";

$form = new Form() ;
echo $form->create('helpers1.php','post');
echo $form->input('nom', $nom);
echo $form->input('prénom', $prenom);
echo $form->breakLine();
echo $form->select('gender', array('key1'=> 'value1', 'key2'=>'value2') );
echo $form->breakLine();
echo $form->textarea('question', 'Votre question ici');
echo $form->breakLine();
echo $form->radio('genre', 'homme', 'Homme');
echo $form->radio('genre', 'femme', 'Femme');
echo $form->breakLine();
echo $form->checkbox('pomme', 'Pomme');
echo $form->checkbox('poire', 'Poire');
echo $form->breakLine();
echo $form->submit('envoyer');
echo $form->end();
