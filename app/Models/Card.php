<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'sg_card_details';
    protected $fillable = [
        'sg_order_id',
        'sg_user_order_email',
        'sg_cd_user_email',
        'sg_cd_user_phone',

        'sg_cd_card_id',

        'sg_cd_cover_image',
        'sg_cd_profile_image',

        'sg_cd_name',
        'sg_cd_designation',
        'sg_cd_company_name',
        'sg_cd_about_us',

        'sg_cd_phone_number',
        'sg_cd_whatsapp_number',
        'sg_cd_Business_whatsapp_number',
        'sg_cd_email',
        'sg_cd_website',

        'sg_cd_Facebook',
        'sg_cd_Instagram',
        'sg_cd_Twitter',
        'sg_cd_Linkedin',
        'sg_cd_Pinterest',
        'sg_cd_Youtube',

        'sg_cd_Office',
        'sg_cd_Branch',
        'sg_cd_Branch2',

        'sg_cd_YouTube_Link',
        'sg_cd_Google_Pay',
        'sg_cd_Phone_pe',
        'sg_cd_Paytm',
        'sg_Bhim_UPI',

        'sg_cd_Title_1',
        'sg_cd_Title_2',
        'sg_cd_Title_3',
        'sg_cd_Title_4',
        'sg_cd_Link_1',
        'sg_cd_Link_2',
        'sg_cd_Link_3',
        'sg_cd_Link_4',

        'sg_brochure',
        'sg_brochure_title',

        'sg_cd_QR_Library',
        'sg_cd_QR_Link',

        'sg_cd_Service_Title_1',
        'sg_cd_Service_Title_2',
        'sg_cd_Service_Title_3',
        'sg_cd_Service_Title_4',
        'sg_cd_Service_Title_5',
        'sg_cd_Service_Title_6',
        'sg_cd_Service_Title_7',
        'sg_cd_Service_Title_8',

        'sg_Service_Image_1',
        'sg_Service_Image_2',
        'sg_Service_Image_3',
        'sg_Service_Image_4',
        'sg_Service_Image_5',
        'sg_Service_Image_6',
        'sg_Service_Image_7',
        'sg_Service_Image_8',

        'sg_cd_Service_About_1',
        'sg_cd_Service_About_2',
        'sg_cd_Service_About_3',
        'sg_cd_Service_About_4',
        'sg_cd_Service_About_5',
        'sg_cd_Service_About_6',
        'sg_cd_Service_About_7',
        'sg_cd_Service_About_8',

        'sg_cd_Gallery_1',
        'sg_cd_Gallery_2',
        'sg_cd_Gallery_3',
        'sg_cd_Gallery_4',
        'sg_cd_Gallery_5',
        'sg_cd_Gallery_6',
        'sg_cd_Gallery_7',
        'sg_cd_Gallery_8',
        'sg_order_status'
    ];
    public $timestamps = false;
}