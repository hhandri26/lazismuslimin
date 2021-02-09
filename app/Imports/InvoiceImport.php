<?php

namespace App\Imports;

use App\Models\InvoiceModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoiceImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new InvoiceModels([
            'invoice_number' => $row['invoice_number'],
            'costumer' => $row['costumer'],
            'mobile_no' => $row['mobile_no'],
            'address' => $row['address'],
            'due_date' => $row['due_date'],
            'reminder_period' => $row['reminder_period'],
            'doc_from' => $row['doc_from'],
            'doc_to' => $row['doc_to'],
            'barcode_document' => $row['barcode_document'],
        ]);

        return redirect(route('invoice.index'));
    }
}
