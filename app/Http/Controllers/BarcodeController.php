<?php

namespace App\Http\Controllers;

use \App\Asset, \App\Consumable;

use App, Session;
use Illuminate\Http\Request;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class BarcodeController extends Controller
{
    private $rules = array(
        'assets' => 'nullable',
        'consumables' => 'nullable',
        'paper_size' => 'required',
    );

    private function parse($string)
    {
        $elements = explode(',', $string);
        $output = [];

        foreach ($elements as $element)
        {
            if ($element == 'all')
            {
                return [-1];
            }
            else if (strpos($element, '-') === false)
            {
                   array_push($output, intval($element));
            }
            else
            {
                $minMax = explode('-', $element);
                if ($minMax[0] <= $minMax[1])
                {
                    $output = array_merge($output, range($minMax[0], $minMax[1]));
                }
            }
        }

        return $output;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $paper_sizes = [
            'label' => 'Label (28mm x 89mm)',
        ];

        return view('pages.barcodes.index', compact('paper_sizes'));
    }

    public function generate(Request $request)
    {
        $validator = $request->validate($this->rules);


        $assets_parsed = $this::parse($validator['assets']);
        if ($assets_parsed == [-1])
        {
            $assets = Asset::all();
        }
        else if ($assets_parsed == [0])
        {
            $assets = null;
        }
        else
        {
            $assets = Asset::whereIn('id', $assets_parsed)->get();
        }

        $consumables_parsed = $this::parse($validator['consumables']);
        if ($consumables_parsed == [-1])
        {
            $consumables = Consumable::all();
        }
        else if ($consumables_parsed == [0])
        {
            $consumables = null;
        }
        else
        {
            $consumables = Consumable::whereIn('id', $consumables_parsed)->get();
        }

        if ($assets == null && $consumables == null)
        {
            Session::flash('message', '<strong>Error!</strong> No barcodes were requested.');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }
        else if ($assets == null)
        {
            $items = $consumables;
        }
        else if ($consumables == null)
        {
            $items = $assets;
        }
        else
        {
            $items = $assets->toBase()->merge($consumables);
        }

        if ($validator['paper_size'] == 'label')
        {
            $paper_size = array(0, 0, 252.283, 79.3701);
            $html = $this::generateLabelPdf($items);
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html)->setPaper($paper_size, 'portrait');

        return $pdf->stream();
    }

    public function generateLabelPdf($items)
    {
        $html = '<!doctype html>
        <html>
        <head>
            <style>
                @page { margin: 10px; }

                .name {
                    position: relative;
                    display: block;
                    font-size: 10pt;
                    height: 32px;
                    overflow: hidden;
                    hyphens: auto;
                    background-color: white;
                }

                .barcode {
                    height: 35px;
                    overflow: hidden;
                    position: absolute;
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    bottom: 13px;
                }

                .id-hash {
                    position: absolute;
                    width: 100%;
                    margin: 0 auto;
                    margin-bottom: -4px;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    font-size: 10pt;
                }

                .id {
                    position: absolute;
                    display: block;
                    bottom: 0;
                    left: 15px;
                    border: 1px solid black;
                    padding: 5px 10px;
                    font-weight: bold;
                }

                .type {
                    position: absolute;
                    display: block;
                    bottom: 0;
                    right: 15px;
                    border: 1px solid black;
                    padding: 5px 10px;
                    font-weight: bold;
                }
                
                .page-break {
                    page-break-after: always;
                    text-align: center;
                }
            </style>
        </head>
        <body>';

        foreach ($items as $item)
        {
            $name = $item->name;
            if (strlen($name) > 80) {
                $name = substr($name, 0, 80) . '...';
            }

            if ($item instanceof \App\Asset)
            {
                $type = 'A';
            }
            else if ($item instanceof \App\Consumable)
            {
                $type = 'C';
            }
            else
            {
                $type = 'Z';
            }

            $html = $html . '
                <div class="page-break">
                    <span class="name">' . $name . '</span>
                    <div class="barcode">' . $item->barcode(1, 35, 10, null) . '</div>
                    <span class="id-hash">' . $item->id_hash . '</span>
                    <span class="id">' . $item->id . '</span>
                    <span class="type">' . $type . '</span>
                </div>';
        }

        $html = $html . '</body></html>';

        return $html;
    }
}
