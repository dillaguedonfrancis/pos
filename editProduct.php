
			<?php
				$xml = new DOMDocument;
				$xml->load('Data/products.xml');
				$id = $_GET['id'];
				$name = $_GET['name'];
				$price = $_GET['price'];
				$quantity = $_GET['quantity'];
				$counter = 0;
				$users = $xml->getElementsByTagName('product');
				
				while($counter < $users->length){
					$ids = $users->item($counter)->getElementsByTagName('id')->item(0)->nodeValue;
					
					if($id == $ids){
						break;
					}
					
					$counter++;
				}
				
				$newValue = $name;
				$newTag = $xml->createElement('name');
				$newText = $xml->createTextNode($newValue);
				$newTag->appendChild($newText);
				$newValues = $price;
				$newTags = $xml->createElement('price');
				$newTexts = $xml->createTextNode($newValues);
				$newTags->appendChild($newTexts);
				$newValuess = $quantity;
				$newTagss = $xml->createElement('quantity');
				$newTextss = $xml->createTextNode($newValuess);
				$newTagss->appendChild($newTextss);

				$oldName = $users->item($counter)->getElementsByTagName('name')->item(0);
				$users->item($counter)->replaceChild($newTag,$oldName);
				$oldPrice = $users->item($counter)->getElementsByTagName('price')->item(0);
				$users->item($counter)->replaceChild($newTags,$oldPrice);
				$oldQuantity = $users->item($counter)->getElementsByTagName('quantity')->item(0);
				$users->item($counter)->replaceChild($newTagss,$oldQuantity);
				$resultsss = $xml->save('Data/products.xml');
				if($resultsss){
					header("LOCATION: ../../../Gilz/prodAdmin.php");
				}
			?>