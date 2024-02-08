<?php
function convertir($input, $formato = "") {
    global $main_system;
    $res = $input;

    if ($input !== "") {
        if ($formato === "" && isset($main_system['formato'])) {
            $formato = $main_system['formato'];
        }

        if ($formato !== "") {
            $form = explode("|", $formato);
            for ($i = 0; $i < count($form); $i++) {
                $form[$i] = trim($form[$i]);
            }

            switch (count($form)) {
                case 1:
                    $form[1] = "."; // Corrección: Añadir punto en el caso 1
                case 2:
                    $form[2] = ""; // Corrección: Asignar cadena vacía en el caso 2
                case 3:
                    // BLOQUE 1
                    $c = array("0", "0");
                    $r = strpos($input, ".");
                    if ($r !== false) {
                        $c[0] = substr($input, 0, $r);
                        $c[1] = substr($input, $r + 1);
                    } else {
                        $c[0] = $input;
                    }
                    if ($c[0] === "-") {
                        $c[0] = "-0";
                    }
                    // FIN BLOQUE 1

                    $res = "";

                    // BLOQUE 2
                    if ($form[2] == "") {
                        $res = $c[0];
                    } else {
                        $l = 0;
                        if (substr($c[0], 0, 1) == "-") {
                            $l = 1;
                        }
                        for ($j = strlen($c[0]) - 1, $z = 0; $j >= $l; $j--, $z++) {
                            if ($z > 0 && $z % 3 == 0) {
                                $res = $form[1] . $res; // Corrección: Utilizar $form[1] en lugar de $form[2]
                            }
                            $res = substr($c[0], $j, 1) . $res;
                        }
                        if (substr($c[0], 0, 1) == "-") {
                            $res = "-" . $res;
                        }
                    }
                    // FIN BLOQUE 2

                    // BLOQUE 3
                    if ($c[1] != "0" && $form[0] != "0") {
                        $res .= $form[1];
                        for ($j = 0; $j < $form[0]; $j++) {
                            if ($j < strlen($c[1])) {
                                $res .= $c[1][$j];
                            } else {
                                $res .= "0";
                            }
                        }
                    }
                    if ($res === "-0") {
                        $res = "0";
                    }
                    // FIN BLOQUE 3
                    break; // Corrección: Agregar break al final del switch
            }
        }
    }
    exit($res);
}
?>
