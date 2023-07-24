<?php

namespace App\Http\Controllers;

use JeroenDesloovere\VCard\VCard;
use App\Http\Controllers\Controller;
use App\Models\Card;
use DB;

class DownloadVcardController extends Controller
{
    public function downloadVcard($id)
    {

        $vcard = new VCard();

        //$card = Card::where(['id' => $id]);
        //$cardq = DB::table('sg_card_details')->where('id', $id)->first();
        $cardq = DB::select('select * from sg_card_details where id=' . $id);
        //print_r($card);
        // define variables
        foreach ($cardq as $carddata) {
            $lastname = '';
            $firstname = $carddata->sg_cd_name;
            $additional = '';
            $prefix = '';
            $suffix = '';

            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

            // add work data
            $vcard->addCompany($carddata->sg_cd_company_name);
            $vcard->addJobtitle($carddata->sg_cd_designation);
            $vcard->addRole('');
            $vcard->addEmail($carddata->sg_cd_email);
            $vcard->addPhoneNumber($carddata->sg_cd_phone_number, 'PREF;WORK');
            $vcard->addPhoneNumber($carddata->sg_cd_whatsapp_number, 'WORK');
            $vcard->addAddress(
                null,
                null,
                '',
                '',
                null,
                '',
                ''
            );
            $vcard->addLabel('-');
            $vcard->addURL($carddata->sg_cd_website);
            return $vcard->download();
        }
    }
}