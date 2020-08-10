<?php


namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class XmlService
{
    private $contents;

    private array $data;

    private $dataXml = [];

    public function __construct()
    {
        $this->contents = $this->getXmlFile('head');
        $this->data['time'] = Carbon::now()->toIso8601String();
    }

    public function getXmlFile(string $nameFile)
    {
        return file_get_contents(resource_path('views/travelclick/'.$nameFile.'.xml'));
    }

    public function setContents(string $view, array $data = []): self
    {
        $this->contents .= $this->getXmlFile($view);
        if (count($data) > 0) {
            array_push($this->data, $data);
        }
        return $this;
    }

    private function parseContent(): void
    {
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, array_keys($this->data));
        $values = array_values($this->data);
        $this->contents = str_replace($keys, $values, $this->contents);
    }

    private function parseXml(array $dataXml)
    {
        foreach ($dataXml as $key => $value)
        {
            if (is_array($value))
            {
                $this->parseXml($value);
            }
        }
    }

    public function response()
    {
        $this->parseContent();
        $response = Response::make($this->contents, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;
    }
}
