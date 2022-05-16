<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Http\Controllers\Storage;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DownloadsController extends Controller
{
  public function getIndex()
  {
      $users = Employee::all();

      return view('employees.download', compact('users'));
  }

  /*public function exportCSV()
  {
      return response()->streamDownload(function () {
      $users = Employee::all()->toArray();
      $head = [
            'id',
            'name',
            'zipcode',
            'add1',
            'add2',
            'telephone',
            'dept1',
            'dept2',
            '-',
            'payment-method',
            '-',
            '-',
            'remark',
            '-',
      ];
        $handle = fopen('php://output', 'w');
        mb_convert_variables('SJIS', 'UTF-8', $head);
        fputcsv($handle, $head);
        foreach ($users as $row) {
            mb_convert_variables('SJIS', 'UTF-8', $row);
            fputcsv($handle, $row);
        }
        fclose($handle);
    }, 'sample.csv');
  }*/
}
