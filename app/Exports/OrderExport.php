<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Lead::all();
        return Order::select("id", "sg_CGST", "sg_SGST", "sg_IGST", "sg_total_tax", 'sg_order_base_price', "sg_price_plus_gst", "sg_total_product_count", "sg_full_name", "sg_business_name", "sg_business_address", "sg_business_GST_number", "sg_business_email", "sg_business_phone", "sg_s_name", "sg_s_address", "sg_s_email", "sg_s_phone", "sg_state", "sg_s_state", "coupon_ID", "franchise_ID", "return_coupon_code", "coupon_discount", "shipping_fee", "before_discount_total", "discounted_price", "after_discount_total", "product_ids", "product_quantities", "product_prices", "sg_tracking_status", "sg_order_status", "order_id_for_status", "payment_remark", "created_at", "Order_status")->get();
    }
    public function headings(): array
    {
        return ["ID", "CGST", "SGST", "IGST", "Total Tax", "Base Price", "Price + GST", "Product Count", "Full Name", "Business Name", "Business Address", "Business GST number", "Business Email", "Business phone", "Shipping name", "Shipping Address", "Email", "Phone", "State", "State", "Coupon ID", "Franchise ID", "Return coupon code", "Coupon Discount", "Shipping fee", "Before Discount Total", "Discounted Price", "After Discount Total", "Product ids", "Product Quantities", "Product prices", "Tracking status", "Order status", "Order id for status", "Payment Remark", "Created Date", "Order Status"];
    }
}