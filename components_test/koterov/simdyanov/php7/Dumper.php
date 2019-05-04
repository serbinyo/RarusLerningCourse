<?php

namespace Koterov\Symdyanov\Php7\Dumper;

class Dumper
{
    ## Функция для вывода содержимого переменной.
    // Распечатывает дамп переменной на экран.
    public static function dumper($obj)
    {
        echo
        "<pre>",
        htmlspecialchars(self::dumperGet($obj)),
        "</pre>";
    }

    // Возвращает строку - дамп значения переменной в древовидной форме
    // (если это массив или объект). В переменной $leftSp хранится
    // строка с пробелами, которая будет выводиться слева от текста.
    public static function dumperGet(&$obj, $leftSp = "")
    {
        if (is_array($obj)) {
            $type = "Array[" . count($obj) . "]";
        } elseif (is_object($obj)) {
            $type = "Object";
        } elseif (gettype($obj) == "boolean") {
            return $obj ? "true" : "false";
        } else {
            return "\"$obj\"";
        }
        $buf = $type;
        $leftSp .= "    ";
        foreach ($obj as $k => $v) {
            if ($k === "GLOBALS") {
                continue;
            }
            $buf .= "\n$leftSp$k => " . self::dumperGet($v, $leftSp);
        }
        return $buf;
    }
}
