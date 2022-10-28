<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//https://blog.quickadminpanel.com/how-to-import-csv-in-laravel-and-choose-matching-fields/

class TemplateController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function template()
    {
        return view('template');
    }

    public function parseTemplate(Request $request) {
        $path = $request->file('csv_file')->getRealPath();

        class CsvImportRequest extends FormRequest
        {
            public function authorize()
            {
                return true;
            }

            public function rules()
            {
                return [
                    'csv_file' => 'required|file'
                ];
            }
        }
    }



    public function addTemplate(Request $request)
    {

        // https://www.webslesson.info/2020/06/import-selected-csv-file-column-in-php-using-ajax-jquery.html
        $error = '';
        $html = '';
        if ($_FILES['file']['name'] != '') {
            $file_array = explode(".", $_FILES['file']['name']);
            $extension = end($file_array);
            if ($extension == 'csv') {
                $file_data = fopen($_FILES['file']['tmp_name'], 'r');
                $file_header = fgetcsv($file_data);
                $html .= '<table class="table table-bordered"><tr>';
                for ($count = 0; $count < count($file_header); $count++) {
                    $html .= '
        <th>
            <select name="set_column_data" class="form-control set_column_data" data-column_number="' . $count . '">
            <option value="">Set Count Data</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="email">Email</option>
            </select>
        </th>
        ';
                }

                $html .= '</tr>';

                $limit = 0;

                while (($row = fgetcsv($file_data)) !== FALSE) {
                    $limit++;
                    if ($limit < 6) {
                        $html .= '<tr>';

                        for ($count = 0; $count < count($row); $count++) {
                            $html .= '<td>' . $row[$count] . '</td>';
                        }

                        $html .= '</tr>';
                    }
                    $temp_data[] = $row;
                }
                $_SESSION['file_data'] = $temp_data;
                $html .= '
        </table>
        <br />
        <div align="right">
        <button type="button" name="import" id="import" class="btn btn-success" disabled>Import</button>
        </div>
        <br />
        ';
            } else {
                $error = 'Only <b>.csv</b> file allowed';
            }
        } else {
            $error = 'Please Select CSV File';
        }
        $output = array(
            'error'  => $error,
            'output' => $html
        );
        echo json_encode($output);
    }
}
