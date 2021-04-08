<?php

namespace Tests\Feature;

use App\Events\RowCreated;
use App\Imports\RowsImports;
use App\Models\Row;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;

class RowsTest extends TestCase
{
    use RefreshDatabase;
    

    /**
     * Нужный формат вывода, с группировкой по date - двумерный массив,
     * диспатчинг ивентов при создании записей в БД
     *
     * @return void
     */
    public function test_group_by_date()
    {
        // broadcast event expecting
        $this->expectsEvents(RowCreated::class);

        Row::factory()->count(3)->date1()->create();
        Row::factory()->count(3)->date2()->create();

        
        $resp = $this->json('get','/rows')->json();

        $this->assertEquals(count($resp['data']['08.04.2020']),3);
        $this->assertEquals(count($resp['data']['08.03.2020']),3);
        
    }

    /**
     * Парс xml файла 
     * 
     *
     * @return void
     */
    public function test_parse_import()
    {
        $this->postJson('/upload',[])->assertStatus(422);
        

        Excel::fake();
        
        Storage::fake();
        $file = UploadedFile::fake()->create('test.xlsx',1000);

        $this->postJson('/upload', [
            'ifile' => $file,
        ])->dump();
        Storage::assertExists('uploaded/'.$file->hashName());

        Excel::assertQueued('uploaded/'.$file->hashName());
    }


}
