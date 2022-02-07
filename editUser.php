
			<?php
				$xml = new DOMDocument;
				$xml->load('Data/users.xml');
				$user = $_GET['user'];
				$first = $_GET['first'];
				$middle = $_GET['middle'];
				$last = $_GET['last'];
				$counter = 0;
				$users = $xml->getElementsByTagName('user');
				
				while($counter < $users->length){
					$userID = $users->item($counter)->getElementsByTagName('username')->item(0)->nodeValue;
					
					if($user == $userID){
						break;
					}
					
					$counter++;
				}
				
				$newValue = $first;
				$newTag = $xml->createElement('firstname');
				$newText = $xml->createTextNode($newValue);
				$newTag->appendChild($newText);
				$newValues = $middle;
				$newTags = $xml->createElement('middlename');
				$newTexts = $xml->createTextNode($newValues);
				$newTags->appendChild($newTexts);
				$newValuess = $last;
				$newTagss = $xml->createElement('lastname');
				$newTextss = $xml->createTextNode($newValuess);
				$newTagss->appendChild($newTextss);

				$oldName = $users->item($counter)->getElementsByTagName('firstname')->item(0);
				$users->item($counter)->replaceChild($newTag,$oldName);
				$oldPrice = $users->item($counter)->getElementsByTagName('middlename')->item(0);
				$users->item($counter)->replaceChild($newTags,$oldPrice);
				$oldQuantity = $users->item($counter)->getElementsByTagName('lastname')->item(0);
				$users->item($counter)->replaceChild($newTagss,$oldQuantity);
				$resultsss = $xml->save('Data/users.xml');
				if($resultsss){
					header("LOCATION: ../../../Gilz/viewUser.php");
				}
			?>