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
        $data = DB::table('sg_order')
            ->whereBetween('created_at', [$this->from_date, $this->to_date])
            ->select(
                "id",
                "sg_CGST",
                "sg_SGST",
                "sg_IGST",
                "sg_total_tax",
                'sg_order_base_price',
                "sg_total_product_count",
                "sg_full_name",
                "sg_business_name",
                "sg_business_address",
                "sg_state",
                "sg_business_GST_number",
                "sg_business_email",
                "sg_business_phone",
                "sg_s_name",
                "sg_s_address",
                "sg_s_email",
                "sg_s_phone",
                "sg_s_state",
                "return_coupon_code",
                "coupon_discount",
                "before_discount_total",
                "discounted_price",
                "after_discount_total",
                "sg_order_status",
                "order_id_for_status",
                "payment_remark",
                "created_at",
                "Order_status"
            )
            ->orderBy('id');
        return $data;
    }
    public function headings(): array
    {
        return [
            "ID",
            "CGST",
            "SGST",
            "IGST",
            "Total Tax",
            "Base Price",
            "Product Count",
            "Full Name",
            "Business Name",
            "Business Address",
            "State",
            "Business GST number",
            "Business Email",
            "Business phone",
            "Shipping name",
            "Shipping Address",
            "Shipping Email",
            "Shipping Phone",
            "ShippingState",
            "Coupon code",
            "Coupon Discount",
            "Before Discount Total",
            "Discounted Price",
            "After Discount Total",
            "Order status",
            "Order id for status",
            "Payment Remark",
            "Created Date",
            "Order Status"
        ];
    }
}