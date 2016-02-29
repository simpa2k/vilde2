<?php

Class DateUtilities {

    private function monthConversion($month) {
        
        $months = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Mars',
            '04' => 'April',
            '05' => 'Maj',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Augusti',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'December',        
            );
        
        return $months[$month];

    }

    private function singleDigitDay($twoDigitDay) {
         
        return $twoDigitDay[1];

    }

    private function dateSplit($date) {

        $explodedDate = explode('-', $date);

        $dateArray = array('year'   => $explodedDate[0],
                           'month'  => $this->monthConversion($explodedDate[1]),
                           'day'    => $explodedDate[2][0] == '0' ? $this->singleDigitDay($explodedDate[2]) : $explodedDate[2]);

        return $dateArray;

    }

    public function dayAndMonth($date) {

        $splitDate = $this->dateSplit($date);

        $dateString = $splitDate['day'] . " " . $splitDate['month'];

        return $dateString;

    }

    public function year($date) {

        $explodedDate = explode('-', $date);

        return $explodedDate[0];

    }

    private function resolveSortingOrder($order, $nextEntryDate, $currentEntryDate) {

        switch($order) {

            case "falling":
                return $nextEntryDate < $currentEntryDate;
                break;
            case "rising":
                return $nextEntryDate > $currentEntryDate;
                break;
            default:
                return $nextEntryDate < $currentEntryDate;
                break;

        }

    }

    public function sortArrayByDate($array, $order) {

        //Sorting the entries recorded in the database,
        //so they can be displayed in the correct order regardless of when they were entered
        for($i = 1; $i < count($array); $i++) {
            //Storing current entry
            $entry = $array[$i];
                                    
            //Storing date of current entry
            $date = $array[$i]->Date;
                                    
            //Storing $i in separate variable $j for manipulation
            $j = $i;
            
            $nextEntryFulfillsSpecifiedSortingOrder = $this->resolveSortingOrder($order, $array[$j - 1]->Date, $date);

            //As long as $j is greater than zero (index of the first entry) and the date of the entry in the previous iteration
            //is less than or greater than (depending on sorting order) that of the current entry
            while($j > 0 && $nextEntryFulfillsSpecifiedSortingOrder) {
                                        
                //The entry at the index of the current iteration is assigned the value of the previous iteration
                $array[$j] = $array[$j - 1];
                                        
                //$j is decremented in order to move "left" in the array
                $j -= 1;
            }
                                    
            //When there are no longer any entries with earlier dates,
            //place the stored entry at the position we are currently in
            $array[$j] = $entry;
        }
        
        return $array;
        
    }

}

