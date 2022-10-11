<?php

require_once "../vendor/autoload.php";

use App\Field\{Text, Boolean, Radio, Checkbox, Field};

$fields = [
    new Text("text"),
    new Radio("radio"),
    new Checkbox("checkbox"),
];

foreach($fields as $fieldType) {
    echo $fieldType->render();
}