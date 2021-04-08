<?php
namespace App\Imports;

use App\Models\Row;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RowsImports implements ToModel, WithChunkReading, ShouldQueue
{
    
    /**
     * ключ
     */
    public string $uniq;
    public function __construct($uniq)
    {
        $this->uniq = $uniq.'_len';
    }
    public function model(array $row)
    {
        
        // записываем обработанные строки
        $currentRowNumber = $this->getRowNumber();
        Redis::set($this->uniq,$currentRowNumber);
        
        $model = new Row();
        $model->name = $row[1];
        $model->fdate = Carbon::createFromFormat('j.n.y',$row[2]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
