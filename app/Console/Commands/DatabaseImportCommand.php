<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DatabaseImportCommand extends Command
{
    protected $signature = 'database:import {--file=database} {--batchsize=100} {--method=all}';

    protected $description = 'Import database from php array';

    public $batchSize;

    public $method;

    public function __construct()
    {
        parent::__construct();

        ini_set('memory_limit', -1);
    }

    public function handle()
    {
        $this->batchSize = $this->option('batchsize');
        $this->method = $this->option('method');
        Schema::disableForeignKeyConstraints();
        $status = $this->processData();
        Schema::enableForeignKeyConstraints();

        return $status;
    }

    private function processData()
    {
        $fileName = $this->option('file') ?? 'database';
        $file = storage_path("app/{$fileName}.php");

        $this->info('Loading file.');
        $this->info("File : {$file}");

        if (! Storage::exists("{$fileName}.php")) {
            $this->error('File not found');
            $this->error("{$file} not found.");

            return false;
        }

        require_once $file;

        $tables = get_defined_vars();
        $this->info('File Loaded. Total Tables: '.count(array_keys($tables)));
        $this->newLine();

        $dataMigrations = [
            'users' => [$users],
        ];

        if ($this->method == 'all') {
            foreach ($dataMigrations as $method => $param) {
                $this->{$method}(...$param);
            }
        } else {
            $param = $dataMigrations[$this->method];
            $this->{$this->method}(...$param);
        }

        $this->newLine();
        $this->info('Data Processed.');

        return true;
    }

    private function users($users)
    {
        $this->newLine();
        $this->info('importing users table. Total Data: '.count($users));
        $bar = $this->output->createProgressBar(count($users));
        $bar->start();

        foreach ($users as $user) {
            User::updateOrCreate([
                'id' => $user['id'],
                'name' => $user['name'],
                'active' => $user['active'],
                'created_by' => $user['created_by'],
                'updated_by' => $user['updated_by'],
                'deleted_by' => $user['deleted_by'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
                'deleted_at' => $user['deleted_at'],
            ], [
                'id' => $user['id'],
                'name' => $user['name'],
                'active' => $user['active'],
                'created_by' => $user['created_by'],
                'updated_by' => $user['updated_by'],
                'deleted_by' => $user['deleted_by'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
                'deleted_at' => $user['deleted_at'],
            ]);

            $bar->advance();
        }

        $bar->finish();
    }
}
