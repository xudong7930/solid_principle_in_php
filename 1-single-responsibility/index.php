<?

// a class should have one and only one reason to change.
// 
class SalesReporter {
    public function between($startDate, $endDate)
    {
        if (Auth::Check()) throw new Exception('Authentication needs reporting');

        $salse = $this->queryDbForSalesBetween($startDate, $endDate);

        return $this->formate($salse);
    }

    protected function queryDbForSalesBetween($startDate, $endDate)
    {
        return DB::table('sales')->whereBetween('create_at', [$startDate, $endDate])->sum('charge') / 100;
    }

    protected function formate($sales)
    {
        echo "<h1>your sales: ".$sales."</h1>" ;
    }
}


//usage
$report = new SalesReporter;

$begin = Carbon\Carbon::now()->subDays(10);
$end = Carbon\Carbon::now();

$report->between($begin, $end);
