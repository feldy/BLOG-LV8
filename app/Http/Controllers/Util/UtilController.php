<?php

namespace App\Http\Controllers\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilController extends Controller
{
    public static function getNamaHari($date) {
        function tanggal($tgl){
            $tanggal = substr($tgl, 8, 2);
            $bulan = bulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $tanggal.' '.$bulan.' '.$tahun;
        }

        function hari($hari){
            $hari = nama_hari(date('w'));
            return $hari;
        }

        function nama_hari($nama_hari){
            switch($nama_hari){
                case 0 :
                    return 'Minggu';
                    break;
                case 1 :
                    return 'Senin';
                    break;
                case 2 :
                    return 'Selasa';
                    break;
                case 3 :
                    return 'Rabu';
                    break;
                case 4 :
                    return 'Kamis';
                    break;
                case 5 :
                    return "Jum'at";
                    break;
                case 6 :
                    return 'Sabtu';
                    break;
            }
        }

        function bulan($bln){
            switch ($bln){
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        }

        return hari($date).", ".tanggal($date)." ".$date->toTimeString();
    }

    public static function UUID() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public static function trim_text($input, $length, $ellipses = true, $strip_html = true) {
        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }

        return $trimmed_text;
    }
}
