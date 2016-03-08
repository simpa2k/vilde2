<?php

require_once("Classes/Views/View.php");

Class MainPageView extends View {

	private function orangeBrown($content) {

		return "<span class='orange-brown'>$content</span>";

	}

	private function red($content) {

		return "<span class='red'>$content</span>";

	}

	private function printDropCap($letter) {

		return "<span class='drop-cap'>$letter</span>";

	}

	private function displayNextGig() {

		$nextGig = $this->_model->getNextGig();
		$gigDate = $this->_model->getDateAsDayAndMonth($nextGig);
		$venue = $this->orangeBrown($nextGig->Venue);

		$this->openRow();
		$this->printColumn("10",
						   "li", 
						   "$gigDate - $venue, $nextGig->City &raquo", 
						   array('id' 		=> 'next-gig',
								 'class' 	=> 'lato list-group-item'));
		$this->closeRow();

	}

	private function displayUpcomingGigs() {

		$upcomingGigs = $this->_model->getUpcomingGigs();

		foreach($upcomingGigs as $gig) {

			$gigDate = $this->_model->getDateAsDayAndMonth($gig);
			$venue = $this->orangeBrown($gig->Venue);
			/*$this->openRow();
			$this->printColumn("2", "li", "$gig->Date, $gig->Venue", array('class' => 'upcoming-gig list-group-item'));
			$this->closeRow();*/
			//echo "<ul class='list-group'>";
			
			$this->openRow();
			$this->printColumn("10",
								"li", 
								"$gigDate - $venue, $gig->City", 
								array('class' => 'lato gig upcoming-gig list-group-item'));
			$this->closeRow();
			//echo "</ul>";

		}

	}

	private function displayPlayedGigs() {

		$years = $this->_model->getGigYears();
		$playedGigs = $this->_model->getPlayedGigs();
		
		$this->openRow();
		$this->printColumn("12", "h5", "Tidigare spelningar &raquo", array('id' => 'dropdown-menu-button'));
		$this->closeRow();

		foreach($playedGigs as $year => $index) {

			$this->openRow();
			$this->printColumn("2", "h5", $year, array('class' => 'dropdown-menu-item'));
			$this->closeRow();

			foreach($index as $gig) {

				$gigDate = $this->_model->getDateAsDayAndMonth($gig);
				$venue = $this->orangeBrown($gig->Venue);

				$this->openRow();
				$this->printColumn("3", "li", "$gigDate - $venue, $gig->City", array('class' => 'lato gig list-group-item dropdown-menu-item'));
				$this->closeRow();

			}

		}

	}

	protected function displayGigs() {

		$this->displayNextGig();
		$this->displayUpcomingGigs();
		$this->displayPlayedGigs();

	}

	protected function printDescription() {

		$description = $this->_model->getDescription();

		echo "<div id='description'>";
		$this->printElement("div", "<p class='drop-cap'>V</p>", array('class' => 'drop-cap-container'));
		$this->printElement("p", "$description->Beskrivning", array('class' => 'large-text'));
		echo "</div>";

	}

	protected function printReviews() {

		$reviews = $this->_model->getReviews();

		foreach($reviews as $review) {

			//$this->printElement("blockquote", "<p>$review->Review</p><p>$review->Info</p>");
			echo "<blockquote><p class='review'>$review->Review</p><footer class='review-info'>$review->Info</footer></blockquote>";

		}

	}

	protected function listMembers() {

		$members = $this->_model->getMembers();

		//echo "<ul class='list-group'>";
		$this->openRow();
		foreach($members as $member) {

			$name = "$member->Firstname $member->Lastname";
			$instruments = $this->red($member->Instrument);

			
			$this->printColumn("4", "div", "<p class='large-text'>$name - $instruments</p>", array('class' => 'member'));
			
			//$this->printElement("li", "$member->Firstname $member->Lastname - $instruments", array('class' => 'list-group-item large-text'));

		}
		$this->closeRow();

		echo "</ul>";

	}

	protected function printContactInformation() {

		$contactInformation = $this->_model->getContactInformation();

		$email = $this->orangeBrown($contactInformation->Email);
		$contactPersonAndPhoneNumber = $this->orangeBrown("$contactInformation->Contactperson - $contactInformation->Telephonenumber");

		echo "<ul class='list-group'>";
		$this->printElement("li", "Email: $email", array('class' => 'list-group-item'));

		$this->printElement("li", 
							"Telefon: $contactPersonAndPhoneNumber", 
							array('class' => 'list-group-item'));
		echo "</ul>";

	}

}