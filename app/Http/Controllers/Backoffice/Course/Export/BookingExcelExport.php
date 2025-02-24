<?php

namespace App\Http\Controllers\Backoffice\Course\Export;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\CourseBooking;

class BookingExcelExport implements FromQuery, WithMapping, WithHeadings
{
	use Exportable;

	/**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     *
     * @return Builder
     */
    public function query()
    {
        return CourseBooking::query()->withCount('participants')->latest();
    }

    /**
     * Control the actual source for each column.
     *
     * @param CourseBooking $booking
     * @return array
     */
    public function map($booking): array
    {
        return [
            $booking->id,
            @$booking->course->name,
            $booking->created_at->format('F j Y'),
            empty($booking->schedule) ? '' : date('F j Y', strtotime($booking->schedule->from)),
            empty($booking->schedule) ? '' : date('F j Y', strtotime($booking->schedule->to)),
            $booking->schedule_type == 'virtual' ? 'Virtual' :
            empty($booking->schedule) ? '' : "{$booking->schedule->city->name}, {$booking->schedule->city->venue->country}",
            "$booking->salutation $booking->name",
            $booking->personal_email,
            $booking->work_email,
            $booking->designation,
            @$booking->company->name,
            $booking->country,
            $booking->phone,
            @$booking->approvedAuthority->name,
            @$booking->approvedAuthority->email,
            @$booking->approvedAuthority->phone,
            $booking->participants_count + 1,
            $booking->learn_about_us,
            $booking->payment_method,
            $booking->tax_percentage,
            $booking->currency_code,
            $booking->booking_cost,
            $booking->tours_cost,
            $booking->software_cost,
            $booking->payment_logs_cost,
            $booking->total_cost,
        ];
    }

    /**
     * The heading to be added as very first row of the sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Course',
            'Application Date',
            'Start Date',
            'End Date',
            'Location',
            'Customer',
            'Personal Email',
            'Work Email',
            'Designation',
            'Company',
            'Country',
            'Phone Number',
            'Approved Authority Name',
            'Approved Authority Email',
            'Approved Authority Phone',
            'Participants',
            'Learn About Us',
            'Payment Method',
            'Tax Percentage',
            'Currency Code',
            'Booking Cost',
            'Tours Cost',
            'Software Cost',
            'Payment Logs Cost',
            'Total Cost',
        ];
    }
}
