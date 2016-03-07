<?php
Class MainPageModel {
	
	private $_db;
	private $_gigs;
	private $_reviews;
	private $_description;
	private $_members;
	private $_contactInformation;
	private $_dateUtilities;
	private $_template;

	public function __construct() {

		$this->_db = DB::getInstance();
		
		$this->_gigs = $this->_db->getAll('konserter')->results();
		$this->_reviews = $this->_db->getAll('reviews')->results();
		$this->_description = $this->_db->getAll('beskrivning')->first();
		$this->_members = $this->_db->getAll('medlemmar')->results();
		$this->_contactInformation = $this->_db->getAll('kontakt')->first();

		$this->_dateUtilities = new DateUtilities();

		$this->_template = "templates/alternatemainpage.php";

	}

    private function sortGigs($sortingOrder = "falling") {

    	$this->_gigs = $this->_dateUtilities->sortArrayByDate($this->_gigs, $sortingOrder);

    }

    public function getDateAsDayAndMonth($gig) {

    	return $this->_dateUtilities->dayAndMonth($gig->Date);

    }

    private function getAndSortGigsToBePlayed() {

    	$gigsToBePlayed = array();

    	$date = date('Y-m-d');

    	foreach($this->_gigs as $gig) {

    		if($gig->Date > $date) {

    			$gigsToBePlayed[] = $gig;

    		}

    	}

    	$gigsToBePlayed = $this->_dateUtilities->sortArrayByDate($gigsToBePlayed, "rising");

    	return $gigsToBePlayed;

    }

	public function getNextGig() {

		$gigsToBePlayed = $this->getAndSortGigsToBePlayed();

		foreach($gigsToBePlayed as $index => $gig) {

			if($index == 0) {

				//$gig->Date = $this->getDateAsDayAndMonth($gig);
				return $gig;

			}

		}

	}

	public function getUpcomingGigs() {

		$gigsToBePlayed = $this->getAndSortGigsToBePlayed();

		$upcomingGigs = array();
		
		foreach($gigsToBePlayed as $index => $gig) {
			
			if($index > 0) {

				//$gig->Date = $this->getDateAsDayAndMonth($gig);
				$upcomingGigs[] = $gig;

			}

		}
		return $upcomingGigs;

	}

	public function getGigYears() {
        
        $years = array();
                
        foreach($this->_gigs as $gig) {
    
            $year = $this->_dateUtilities->year($gig->Date);
                            
            if(!in_array($year, $years)) {
    
                $years[] = $year;
                
            }
        }
        return $years;
    }

	public function getPlayedGigs() {

		$this->sortGigs();

		$currentDate = date('Y-m-d');

		$playedGigs = array();

		foreach($this->_gigs as $index => $gig) {

			if($gig->Date < $currentDate) {

				$gigDate = $gig->Date;
				$gigYear = $this->_dateUtilities->year($gigDate);
				
				$playedGigs[$gigYear][$index] = $gig;

			}

		}
		return $playedGigs;

	}

	public function getReviews() {

		return $this->_reviews;

	}

	public function getDescription() {

		return $this->_description;

	}

	public function getMembers() {

		return $this->_members;

	}

	public function getContactInformation() {

		return $this->_contactInformation;

	}

	public function getTemplate() {

		return $this->_template;

	}

}
