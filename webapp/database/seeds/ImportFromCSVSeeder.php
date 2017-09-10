<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class ImportFromCSVSeeder extends Seeder
{

    // CSV Reader
    protected $reader;
    protected $keys = [];

    // Configuration
    protected $csv_file_name;
    protected $csv_file_path;

    /**
     * ImportFromCSVSeeder constructor.
     */
    public function __construct()
    {
        $this->csv_file_path = base_path() . '/resources/data/core/csv/' . $this->csv_file_name;
        $this->reader = Reader::createFromPath($this->csv_file_path);
    }

    /**
     * Run the database seeds.
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $this->importFromCSV();
    }

    /**
     * A placeholder method to be extended by inheriting classes to inject their own logic
     */
    protected function importFromCSV()
    {
        // To be extended by children
    }

    /**
     * A convenience method to import data from the predefined variables
     * @param bool $hasHeaderRow
     * @return Iterator
     */
    protected function getCSVData($hasHeaderRow = false)
    {
        if ($hasHeaderRow) {
            $this->reader->setOffset(1);
        }

        return $this->reader->fetchAssoc($this->keys);
    }

}
