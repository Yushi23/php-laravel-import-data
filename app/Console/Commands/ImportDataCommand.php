<?php

namespace App\Console\Commands;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class ImportDataCommand extends Command
{
    protected $signature = 'import:data  {--key=} {--dateFrom=2024-05-01}';
    protected $description = 'Get data from endpoints';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->option('key');
        $dateFrom = $this->option('dateFrom');

        if (!isset($key)) {
             return $this->error('Укажите ключ');
        }

        $this->insertData('stocks', $key);
        $this->insertData('incomes', $key, $dateFrom);
        $this->insertData('sales', $key, $dateFrom);
        $this->insertData('orders', $key, $dateFrom);
        $this->info('Все данные загружены!');
    }

    public function insertData($entity, $key, $dateFrom = null)
    {
        $count = 1;

        switch ($entity) {
            case 'incomes':
                $create = function ($income) {
                    Income::create($income);
                };
                break;

            case 'sales':
                $create = function ($sale) {
                   Sale::create($sale);
                };
                break;

            case 'orders':
                $create = function ($order) {
                    Order::create($order);
                };
                break;

            case 'stocks':
                $create = function ($stock) {
                    Stock::create($stock);
                };
                break;
        }

        if (isset($dateFrom)) {
            while (true) {
                $responseEntity = Http::get('http://89.108.115.241:6969/api/' . $entity, [
                    'dateFrom' => $dateFrom,
                    'dateTo' => Carbon::now()->format('Y-m-d'),
                    'page' => $count,
                    'key' => $key,
                ]);

                $entityData = json_decode($responseEntity->body())->data;
                foreach ($entityData as $data) {
                    $create(collect($data)->toArray());
                }

                //end
                $entityNextPage = json_decode($responseEntity->body())->links->next;
                if ($entityNextPage == null) {
                    break;
                }

                $count++;
            }
        } else {
            while (true) {
                $responseEntity = Http::get('http://89.108.115.241:6969/api/' . $entity, [
                    'dateFrom' => Carbon::now()->format('Y-m-d'),
                    'page' => $count,
                    'key' => $key,
                ]);

                $entityData = json_decode($responseEntity->body())->data;
                foreach ($entityData as $data) {
                    $create(collect($data)->toArray());
                }

                //end
                $entityNextPage = json_decode($responseEntity->body())->links->next;
                if ($entityNextPage == null) {
                    break;
                }

                $count++;
            }
        }


    }
}
