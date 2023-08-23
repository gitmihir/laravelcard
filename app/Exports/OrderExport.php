<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    protected $from_date;
    protected $to_date;

    function __construct($from_date, $to_date)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        if ($this->from_date === $this->to_date) {
            $data = DB::table('sg_order')
                ->select(
                    "id",
                    "created_at",
                    "order_id_for_status",
                    "Order_status",
                    "sg_business_name",
                    "sg_full_name",
                    "sg_business_address",
                    "sg_state",
                    "sg_business_GST_number",
                    "sg_business_email",
                    "sg_business_phone",
                    "sg_total_product_count",
                    "before_discount_total",
                    "discounted_price",
                    'sg_order_base_price',
                    "sg_CGST",
                    "sg_SGST",
                    "sg_IGST",
                    "sg_total_tax",
                    "after_discount_total",
                    "payment_remark",
                    "return_coupon_code",
                    "coupon_discount",
                    "sg_s_name",
                    "sg_s_address",
                    "sg_s_email",
                    "sg_s_phone",
                    "sg_s_state",
                )
                ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $this->from_date)
                ->orderBy('id');
        } else {
            $data = DB::table('sg_order')
                ->whereBetween('created_at', [$this->from_date, $this->to_date])
                ->select(
                    "id",
                    "created_at",
                    "order_id_for_status",
                    "Order_status",
                    "sg_business_name",
                    "sg_full_name",
                    "sg_business_address",
                    "sg_state",
                    "sg_business_GST_number",
                    "sg_business_email",
                    "sg_business_phone",
                    "sg_total_product_count",
                    "before_discount_total",
                    "discounted_price",
                    'sg_order_base_price',
                    "sg_CGST",
                    "sg_SGST",
                    "sg_IGST",
                    "sg_total_tax",
                    "after_discount_total",
                    "payment_remark",
                    "return_coupon_code",
                    "coupon_discount",
                    "sg_s_name",
                    "sg_s_address",
                    "sg_s_email",
                    "sg_s_phone",
                    "sg_s_state",
                )
                ->orderBy('id');
        }
        return $data;
    }
    public function headings(): array
    {
        return [
            "Invoice No",
            "Invoice Date",
            "Order ID",
            "Order Status",
            "Business Name",
            "Full Name",
            "Business Address",
            "State",
            "GST number",
            "Business Email",
            "Business phone",
            "Product Count",
            "Total Price",
            "Discount",
            "After Discount Price",
            "CGST",
            "SGST",
            "IGST",
            "Total Tax",
            "Grand Total",
            "Payment Remark",
            "Coupon code",
            "Coupon Discount",
            "Shipping name",
            "Shipping Address",
            "Shipping Email",
            "Shipping Phone",
            "Shipping State",
        ];
    }
}