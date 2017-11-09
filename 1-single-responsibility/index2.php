<?
// fix index.php
interface SalesOutputInterface {
    public function output();
}

class HtmlOutput implements SalesOutputInterface {
    public function output($sales)
    {
        echo "<h1>{$sales}</h1>";
    }
}

class SalesRepository {
    public function between()
    {
        return DB::table('sales')->whereBetween('create_at', [$startDate, $endDate])->sum('charge') / 100;
    }
}

class SalsReporter {
    public $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formater)
    {
        $sales = $this->report->between($startDate, $endDate);
        $formater->output($sales);
    }
}


// example usage.
$report = new SalsReporter(new SalesRepository);
$startDate = Carbon\Carbon::subDays(10);
$endDate = Carbon\Carbon::now();
$formater = new HtmlOutput;
$report->between($startDate, $endDate, $formater);
