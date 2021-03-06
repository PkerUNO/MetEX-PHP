<?php
App::uses('AppHelper', 'View/Helper');

class NavigationHelper extends AppHelper {
	public $helpers = array('LineBadge', 'Html');
	
	public function addSequentialNavLink($movements, $direction) {
		$linkPrefix = '';
		$linkSuffix = '';
		
		$linkOutput = '';
		
		switch($direction) {
			case 'up':
				$stationKey = 'UpStation';
				$textAlign = 'left';
				$linkPrefix = '&lt; ';
				break;
			case 'down':
				$stationKey = 'DownStation';
				$textAlign = 'right';
				$linkSuffix = ' &gt;';
				break;
			default:
				throw new InternalErrorException('Missing or wrong direction specified');
		}
		
		$stationCount = 1;
		
		if (isset($movements[0])) {
			foreach ($movements as $movement) {
				$linkOutput .= '<h2 class="text-' . $textAlign . '" id="nav-station-' . $direction .'-' . $stationCount . '">' . $linkPrefix;
				
				if ($movement[$direction . '_allowed']) {
					$linkOutput .= $this->Html->link($movement[$stationKey]['name'], array('controller' => 'stations', 'action' => 'view', $movement[$stationKey]['id']));
				}
				else {
					if ($movement[$direction . '_station_id'] != null) {	// Illegal movement: in reality, train does not go in this direction.
						$linkOutput .= $this->Html->link($movement[$stationKey]['name'], array('controller' => 'stations', 'action' => 'view', $movement[$stationKey]['id']), array('class' => 'bg-danger'));	// TODO: bg-danger class for "illegal" movements is temporary. Replace this with proper CSS styling later.
					}
					else {	// Terminus station: there is no station beyond this one.
						$linkOutput .= 'Terminus';	
					}
				}
				
				$linkOutput .= $linkSuffix . '</h2>';
				
				$stationCount++;
			}
		}
		
		return $linkOutput;
    }
    
    public function addConnectionsList($interchanges = null, $currentStationID = null) {
	    $listOutput = '';
	    
	    if (isset($interchanges['Station'][0]) && isset($currentStationID) && is_numeric($currentStationID)) {
		    $listOutput .= '<ul>';
		    foreach ($interchanges['Station'] as $station) {
			    if ($station['id'] != $currentStationID) {	// We don't want to list the current station in the Connections list
					$listOutput .= '<li class="line-' . $station['Line']['id'] .'">' . $this->LineBadge->addLineBadge($station['Line']['name']) . ' ' . $this->Html->link($station['name'], array('controller' => 'stations', 'action' => 'view', $station['id'])) . '</li>';
			    }
		    }
		    $listOutput .= '</ul>';
	    } else {
		    $listOutput = $this->Html->para(null, 'No connections');
	    }
	    
	    return $listOutput;
    }
    
    public function addPlacesList($places = null) {
	    $listOutput = '';
	    
	    if (isset($places[0]['id'])) {
		    $listOutput .= '<ul>';
		    foreach ($places as $place) {
			    $listOutput .= '<li>' . $this->Html->link($place['name'], array('controller' => 'places', 'action' => 'view', $place['id'])) . '</li>';
		    }
		    $listOutput .= '</ul>';
	    } else {
		    $listOutput = $this->Html->para(null, 'No places nearby');
	    }
	    
	    return $listOutput;
    }
}