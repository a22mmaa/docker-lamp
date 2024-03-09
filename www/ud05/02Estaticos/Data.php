<?php

date_default_timezone_set('Europe/Madrid');

class Data
{
    private static $calendario = "Calendario gregoriano";

    private static $dias = ['Domingo', 'Luns', 'Martes', 'Mércores', 'Xoves', 'Venres', 'Sábado'];

    private static $meses = ['Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño', 'Xullo', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Decembro'];

    public static function getData()
    {
        $ano       = date('Y'); //Nos da el año actual
        $mes       = self::$meses[date('m') - 1];
        $dia       = date('d');
        $diaSemana = self::$dias[date('w')];

        return $diaSemana . ' ' . $dia . ' de ' . $mes . ' del ' . $ano;
    }

    public static function getCalendar()
    {
        return self::$calendario;
    }

    public static function getHora()
    {
        $hora = new DateTime();
        return $hora->format('H:i:s');
    }

    public static function getDataHora()
    {
        echo 'Usamos el calendario: ' . self::getCalendar() . '<br/>';
        echo 'Hoy es ' . self::getData() . ' y son las ' . self::getHora();
    }

}
