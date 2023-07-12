<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;
use Symfony\Component\Uid\Ulid;

class CSVController extends Controller
{
    public function read()
    {
        $path = "C:/Users/lenovo/Desktop/test.csv";

        $rows = SimpleExcelReader::create($path)->getRows();

        $rows->each(function (array $rowProperties) {
            dd($rowProperties);
        });
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls|max:2048',
            'alias' => 'string|max:255',
        ]);

        // get the file path
        $file = $request->file('file');

        // Process the file
        $filePath = $file->store('uploads'); // Move the file to a permanent location
        $rows = SimpleExcelReader::create(storage_path('app/' . $filePath))->getRows();

        $newData = [];

        // Process each row
        foreach ($rows as $row) {
            // Check if email, phone, or company already exists in the database
            $existingRecord = Prospect::where('email', $row['email'])
                ->orWhere('phone', $row['phone'])
                ->orWhere('company', $row['company'])
                ->first();

            if ($existingRecord === null) {
                $newData[] = $row;
            }
        }

        // Count the newly added rows
        $newRowsCount = count($newData);

        $successMessage = 'File uploaded and processed successfully';

        if ($newRowsCount === 1) {
            $newRowsCount === 1 ? $successMessage .= ' with 1 new row added.' : $successMessage .= ' with ' . $newRowsCount . ' new rows added.';
        } else {
            $successMessage .= ' without any new data added.';
        }

        // Save the row
        Prospect::insert($newData);

        return redirect()->back()->with('success', $successMessage);
    }
}
