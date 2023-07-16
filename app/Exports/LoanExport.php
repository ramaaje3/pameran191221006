<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LoanExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison, WithColumnFormatting
{
    public $collection;

    protected $rowNumber = 0;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }

    /**
     * @var Seller
     */
    public function map($loan): array
    {
        return [
            ++$this->rowNumber,
            $loan->driver->nama,
            $loan->vehicle->nama,
            Date::dateTimeToExcel(Carbon::createFromFormat('Y-m-d', $loan->tgl_pinjam)),
            Date::dateTimeToExcel(Carbon::createFromFormat('Y-m-d', $loan->batas_waktu)),
            $loan->status->nama,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Member',
            'Tanggal Pinjam',
            'Batas Waktu',
            'Status',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}