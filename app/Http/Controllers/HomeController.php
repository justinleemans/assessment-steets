<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private const COUNT_BACK_AMOUNT = 30;
    
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $primeYears = $this->sieveOfEratosthenes($request->year, self::COUNT_BACK_AMOUNT);
        
        $years = [];
        foreach ($primeYears as $yearNumber)
        {
            $years[] = Year::firstOrCreate(
                ['year' => $yearNumber],
                ['day' => $this->getChristmasDay($yearNumber)],
            );
        }

        return response()->json([
            'years' => $years,
        ]);
    }

    private function sieveOfEratosthenes($max, $count)
    {
        $isPrime = array_fill(0, $max + 1, true);
        $isPrime[0] = $isPrime[1] = false;
    
        for ($i = 2; $i * $i <= $max; $i++)
        {
            if ($isPrime[$i])
            {
                for ($j = $i * $i; $j <= $max; $j += $i)
                {
                    $isPrime[$j] = false;
                }
            }
        }
    
        $primeNumbers = [];
        for ($i = $max; $i >= 2; $i--)
        {
            if ($isPrime[$i])
            {
                $primeNumbers[] = $i;

                if (count($primeNumbers) == $count)
                {
                    break;
                }
            }
        }
    
        return $primeNumbers;
    }

    private function getChristmasDay($year)
    {
        $date = new \DateTime("$year-12-25");
        return $date->format('l');
    }
}
