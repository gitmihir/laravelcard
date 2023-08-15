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
        $cardq = DB::select('select * from sg_card_details where id=' . $id);
        foreach ($cardq as $carddata) {
            $lastname = '';
            $firstname = $carddata->sg_cd_name;
            $additional = '';
            $prefix = '';
            $suffix = '';
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
            $vcard->addCompany($carddata->sg_cd_company_name);
            $vcard->addJobtitle($carddata->sg_cd_designation);
            $vcard->addRole('');
            $vcard->addEmail($carddata->sg_cd_email);
            $vcard->addPhoneNumber($carddata->sg_cd_phone_number, 'PREF;WORK');
            $vcard->addPhoneNumber($carddata->sg_cd_whatsapp_number, 'TYPE=Whatsapp');
            $vcard->addAddress();
            $logopath = public_path() . '/images/cardimages/';
            $logo = isset($carddata->sg_cd_profile_image) && !empty($carddata->sg_cd_profile_image) ? $logopath . $carddata->sg_cd_profile_image : $logopath . $carddata->sg_cd_profile_image;
            $vcard->addPhoto($logo);
            $vcard->addLabel('-');
            $vcard->addURL($carddata->sg_cd_website, 'TYPE=Website');
            $vcard->addURL($carddata->sg_cd_Facebook, 'TYPE=Facebook');
            $vcard->addURL($carddata->sg_cd_Instagram, 'TYPE=Instagram');
            $vcard->addURL($carddata->sg_cd_Twitter, 'TYPE=Twitter');
            $vcard->addURL($carddata->sg_cd_Pinterest, 'TYPE=Pinterest');
            $vcard->addURL($carddata->sg_cd_Youtube, 'TYPE=Youtube');
            $vcard->addURL($carddata->sg_cd_Linkedin, 'TYPE=Linkedin');
            $vcard->addURL($carddata->sg_cd_Snapchat, 'TYPE=Snapchat');
            $vcard->addURL($carddata->sg_cd_google_business, 'TYPE=Google Business');
            $vcard->addURL(URL('/') . $carddata->sg_cd_QR_Library, 'TYPE=Card Link');

            $path = public_path() . '/images/cards/';

            \File::delete($path);
            if (!is_dir($path)) {
                \File::makeDirectory($path, 0777);
            }
            $vcard->setSavePath($path);
            $vcard->save();
            $file = $vcard->getFilename() . '.' . $vcard->getFileExtension();
            self::download($path . '/' . $file);
        }
    }
    function download($file)
    {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush();
            readfile($file);
            exit;
        }
    }
}