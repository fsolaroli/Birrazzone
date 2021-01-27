<?php

/*
$stmt = $this->db->prepare("");
$stmt->bind_param('i', $n);
$stmt->execute();
$result = $stmt->get_result();
return $result->fetch_all(MYSQLI_ASSOC);
*/

class DatabaseHelper{
	private $db;
	private $EmailPlaceHolder = "EmailPlaceholder";
	private $NamePlaceHolder = "NamePlaceholder";
	private $DistantPast = '1000-01-01 00:00:00';
	private $DistantFuture = '4000-01-01 00:00:00';

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
	}

	public function getRandomBeer($n=4) {
		$stmt = $this->db->prepare ("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Prezzo.IdBirra=Birra.IdBirra
										JOIN Birrificio ON Birra.IdBirrificio=Birrificio.IdBirrificio
										WHERE Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()
										ORDER BY RAND()
										LIMIT ?");
		$stmt->bind_param('i',$n);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getRandomSeller($n=4) {
		$stmt = $this->db->prepare ("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.DescrizioneBirrificio, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE SM.Codice='ATTIVA'
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()
										ORDER BY RAND()
										LIMIT ?");
		$stmt->bind_param('i',$n);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function searchBeer($searchTag) {

		// POSSIBLE TODO (replace special character)
		// $dataToReplace = [1 => 'one', 2 => 'two', 3 => 'three'];
		// $sqlReplace = '';
		// foreach ($dataToReplace as $key => $val) {
		// 	$sqlReplace = 'REPLACE(' . ($sqlReplace ? $sqlReplace : 'replace_field') . ', "' . $key . '", "' . $val . '")';
		// }

		$stmt = $this->db->prepare ("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirrificio
										WHERE LOCATE(?, Birra.NomeBirra)!=0
										OR LOCATE(?, Birrificio.NomeBirrificio)!=0
										AND Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('ss',$searchTag, $searchTag);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function searchSeller($searchTag) {
		$stmt = $this->db->prepare ("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE LOCATE(?, B.NomeBirrificio)!=0
										AND SM.Codice='ATTIVA'
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('s',$searchTag);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getBeer($BeerId) {
		$stmt = $this->db->prepare ("	SELECT Birra.*, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirrificio
										WHERE Birra.IdBirra=?
										AND Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('i',$BeerId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getSeller($SellerId) {
		// $stmt = $this->db->prepare ("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.DescrizioneBirrificio, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
		$stmt = $this->db->prepare ("	SELECT B.* FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE B.IdBirrificio=?
										AND SM.Codice='ATTIVA'
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getSellerBeer($SellerId) {
		$stmt = $this->db->prepare ("	SELECT Birra.*, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirrificio
										WHERE Birra.IdBirrificio=?
										AND Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getBestSellerBeer($SellerId, $n=4) {
		$stmt = $this->db->prepare ("	SELECT Birra.*, Prezzo.Prezzo FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra=Birra.IdBirra
										JOIN Prezzo ON Birra.IdBirra = Prezzo.IdBirra
										WHERE Birra.IdBirrificio=?
										AND MovimentoUtente.IdOrdine IS NOT NULL
										AND Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()
										GROUP BY Birra.IdBirra
										ORDER BY -SUM(Movimento.Quantita) DESC
										LIMIT ?");
		$stmt->bind_param('ii',$SellerId, $n);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);		
	}

	public function getShoppingCart($UserId) {
		$stmt = $this->db->prepare ("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.FotoBirra, Prezzo.Prezzo, -SUM(Movimento.Quantita) AS `QuantitaTot`, (-SUM(Movimento.Quantita)*Prezzo.Prezzo) AS `Totale` FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra=Birra.IdBirra
										JOIN Prezzo ON Birra.IdBirra = Prezzo.IdBirra
										WHERE MovimentoUtente.IdUtente=?
										AND MovimentoUtente.IdOrdine IS NULL
										AND Prezzo.DaData <= NOW()
										AND Prezzo.AData > NOW()
										GROUP BY Birra.IdBirra");
		$stmt->bind_param('i',$UserId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);		
	}

	public function addBeerToShoppingCart($UserId, $BeerId, $quantity) {		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Movimento	(
																				IdBirra,
																				DataMovimento,
																				Quantita,
																				TipoMovimento
																			)
																	values	(?, NOW(), -?, 1)");
		$stmt->bind_param('ii', $BeerId, $quantity);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.MovimentoUtente	(
																					IdMovimento,
																					IdUtente
																				)
																		values	(LAST_INSERT_ID(), ?)");
		$stmt->bind_param('i', $UserId);
		return $stmt->execute();
	}

	public function removeBeerFromShoppingCart($UserId, $BeerId) {	
		$extractMovementId = function($WrappedValue) {
			return $WrappedValue["IdMovimento"];
		};
		
		$stmt = $this->db->prepare ("	SELECT Movimento.IdMovimento FROM birrazzone.Movimento	
										JOIN birrazzone.MovimentoUtente ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										WHERE MovimentoUtente.IdUtente=?
										AND MovimentoUtente.IdOrdine IS NULL
										AND Movimento.IdBirra=?");
		$stmt->bind_param('ii', $UserId, $BeerId);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC);
		$MovementToRemove = "(".implode(",", array_map($extractMovementId, $result)).")";

		$stmt = $this->db->prepare ("	DELETE FROM birrazzone.MovimentoUtente	
										WHERE MovimentoUtente.IdMovimento IN ".$MovementToRemove);
		$stmt->execute();

		$stmt = $this->db->prepare ("	DELETE FROM birrazzone.Movimento	
										WHERE Movimento.IdMovimento IN ".$MovementToRemove);
		return $stmt->execute();
	}

	public function checkUserLogin($email, $password) {
		$stmt = $this->db->prepare ("	SELECT Utente.* FROM Utente
										WHERE Utente.EmailUtente=?");
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$result = $stmt->get_result();
		$users = $result->fetch_all(MYSQLI_ASSOC);
		
		foreach ($users as $user) {
			if (password_verify($password, $user["PasswordUtente"])) {
				return array($user);
			}
		}
		return array();
	}
	
	public function checkSellerLogin($email, $password) {
		$stmt = $this->db->prepare ("	SELECT Birrificio.* FROM Birrificio
										JOIN StatoMembershipBirrificio AS SMB ON SMB.IdBirrificio=Birrificio.IdBirrificio
										WHERE Birrificio.EmailBirrificio=?
										AND SMB.IdStatoMembership=4
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$result = $stmt->get_result();		
		$sellers = $result->fetch_all(MYSQLI_ASSOC);

		foreach ($sellers as $seller) {
			if (password_verify($password, $seller["PasswordBirrificio"])) {
				return array($seller);
			}
		}
		return array();
	}

	public function getAllSeller() {
		$stmt = $this->db->prepare ("	SELECT Birrificio.IdBirrificio, Birrificio.NomeBirrificio FROM Birrificio
										JOIN StatoMembershipBirrificio AS SMB ON SMB.IdBirrificio=Birrificio.IdBirrificio
										WHERE SMB.IdStatoMembership=4
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getBeerQuantity($BeerId) {		
		$stmt = $this->db->prepare ("	SELECT SUM(Movimento.Quantita) AS `Quantità` FROM Movimento
										WHERE Movimento.IdBirra=?
										GROUP BY Movimento.IdBirra");
		$stmt->bind_param('i',$BeerId);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC);

		if (empty($result)) {
			$quantity = 0;
		} else {
			$quantity = $result[0]["Quantità"];
		}

		return $quantity;
	}
	
	public function getNumberOfBeerSold($BeerId) {
		$stmt = $this->db->prepare ("	SELECT -SUM(Movimento.Quantita) AS `QuantitàVenduta` FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra=Birra.IdBirra
										WHERE Birra.IdBirra=?
										AND MovimentoUtente.IdOrdine IS NOT NULL
										GROUP BY Birra.IdBirra");
		$stmt->bind_param('i',$BeerId);
		$stmt->execute();
		$result = $stmt->get_result();

		$beerSold = $result->fetch_all(MYSQLI_ASSOC);
		if (empty($beerSold)) {
			return 0;
		} else {
			return $beerSold[0]["QuantitàVenduta"];
		}
	}

	public function getSellerRequest() {
		$stmt = $this->db->prepare ("	SELECT Birrificio.* FROM Birrificio
										JOIN StatoMembershipBirrificio AS SMB ON SMB.IdBirrificio=Birrificio.IdBirrificio
										WHERE SMB.IdStatoMembership=1
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getUsedToken(){
		$extractToken = function($WrappedValue) {
			return $WrappedValue["Token"];
		};		
		$stmt = $this->db->prepare ("	SELECT SMB.Token FROM StatoMembershipBirrificio AS SMB
										WHERE SMB.Token IS NOT NULL");
		$stmt->execute();
		$result = $stmt->get_result();
		$Tokens = $result->fetch_all(MYSQLI_ASSOC);
		return array_map($extractToken, $Tokens);
	}

	public function acceptSellerRequest($SellerId, $token) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.StatoMembershipBirrificio AS SMB
										SET SMB.AData=NOW()
										WHERE SMB.IdBirrificio=?
										AND SMB.IdStatoMembership=1
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i', $SellerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoMembershipBirrificio	(
																							IdBirrificio,
																							IdStatoMembership,
																							DaData,
																							AData,
																							Token
																						)
																				values	(?, 2, NOW(), ?, ?)");
		$stmt->bind_param('iss', $SellerId, $this->DistantFuture, $token);
		return $stmt->execute();
	}

	public function rejectSellerRequest($SellerId) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.NomeBirrificio=?,
											Birrificio.EmailBirrificio=CONCAT(?, '1', Birrificio.IdBirrificio),
											Birrificio.PartitaIVA=Birrificio.IdBirrificio,
											Birrificio.Localita=NULL,
											Birrificio.DescrizioneBirrificio=NULL,
											Birrificio.FotoBirrificio=NULL
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('ssi', $this->NamePlaceHolder, $this->EmailPlaceHolder, $SellerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	UPDATE birrazzone.StatoMembershipBirrificio AS SMB
										SET SMB.AData=NOW()
										WHERE SMB.IdBirrificio=?
										AND SMB.IdStatoMembership=1
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i', $SellerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoMembershipBirrificio	(
																							IdBirrificio,
																							IdStatoMembership,
																							DaData,
																							AData
																						)
																				values	(?, 3, NOW(), ?)");
		$stmt->bind_param('is', $SellerId, $this->DistantFuture);
		return $stmt->execute();
	}

	public function getUser($UserId) {
		$stmt = $this->db->prepare ("	SELECT Utente.* FROM Utente
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('i',$UserId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function getUsedEmail() {
		$extractMail = function($WrappedValue) {
			return $WrappedValue["Email"];
		};
		$stmt = $this->db->prepare ("SELECT Utente.EmailUtente AS Email FROM Utente");
		$stmt->execute();
		$result = $stmt->get_result();
		$UsersEmail = $result->fetch_all(MYSQLI_ASSOC);
		$stmt = $this->db->prepare ("SELECT Birrificio.EmailBirrificio AS Email FROM Birrificio");
		$stmt->execute();
		$result = $stmt->get_result();
		$SellersEmail = $result->fetch_all(MYSQLI_ASSOC);
		$UsersEmail=array_map($extractMail, $UsersEmail);
		$SellersEmail=array_map($extractMail, $SellersEmail);
		return array_merge($UsersEmail, $SellersEmail);
	}

	public function registerUser($name, $email, $password) {
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Utente 	(
																			NomeUtente,
																			EmailUtente,
																			PasswordUtente
																		)
																values	(?, ?, ?)");
		$stmt->bind_param('sss',$name, $email, $passwordHash);
		return $stmt->execute();	
	}

	public function getUserNotification($UserId) {
		$stmt = $this->db->prepare ("	SELECT Notifica.* FROM Notifica
										WHERE Notifica.IdUtente=?
										AND Notifica.DataLettura > NOW()");
		$stmt->bind_param('i',$UserId);
		$stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function readNotification($NotificationId) {		
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Notifica
										SET Notifica.DataLettura=NOW()
										WHERE Notifica.IdNotifica=?");
		$stmt->bind_param('i',$NotificationId);
		return $stmt->execute();
	}
	
	public function getAddress($AddressId) {
		$stmt = $this->db->prepare ("	SELECT Indirizzo.* FROM Indirizzo
										WHERE Indirizzo.IdIndirizzo=?");
		$stmt->bind_param('i',$AddressId);
		$stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function deleteAddress($UserId) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Utente
										SET Utente.IdIndirizzo=NULL
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('s', $UserId);
		return $stmt->execute();		
	}

	public function updateUserData($UserId, $name, $email) {				
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Utente
										SET Utente.NomeUtente=?,
											Utente.EmailUtente=?
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('ssi', $name, $email, $UserId);
		return $stmt->execute();
	}

	public function updateUserPassword($UserId, $password) {
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Utente
										SET Utente.PasswordUtente=?
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('si', $passwordHash, $UserId);
		return $stmt->execute();
	}

	public function deleteUser($UserId) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Utente
										SET Utente.NomeUtente=?,
											Utente.EmailUtente=CONCAT(?, '0', Utente.IdUtente)
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('ssi', $this->NamePlaceHolder, $this->EmailPlaceHolder, $UserId);
		return $stmt->execute();
	}

	public function updateUserAddress($UserId, $Via, $Citta, $Provincia, $CAP) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Indirizzo 	(
																				Via,
																				Citta,
																				Provincia,
																				CAP
																			)
																	values	(?, ?, ?, ?)");
		$stmt->bind_param('ssss',$Via, $Citta, $Provincia, $CAP);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Utente
										SET Utente.IdIndirizzo=LAST_INSERT_ID()
										WHERE Utente.IdUtente=?");
		$stmt->bind_param('i', $UserId);
		return $stmt->execute();
	}

	public function getAllUserOrders($UserId) {			
		$stmt = $this->db->prepare ("	SELECT Ordine.* FROM Ordine
										WHERE Ordine.IdUtente=?");
		$stmt->bind_param('i',$UserId);
		$stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function getOrder($OrderId) {
		$stmt = $this->db->prepare ("	SELECT Ordine.*, SO.* FROM Ordine
										JOIN StatoEvasioneOrdine AS SEO ON SEO.IdOrdine = Ordine.IdOrdine
										JOIN StatoOrdine AS SO ON SEO.IdStatoOrdine = SO.IdStatoOrdine
										WHERE Ordine.IdOrdine = ?
										AND SEO.DaData <= NOW()
										AND SEO.AData > NOW()");
		$stmt->bind_param('i',$OrderId);
		$stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function getOrderProducts($OrderId) {
		$stmt = $this->db->prepare ("	SELECT Birra.*, Prezzo.Prezzo, -SUM(Movimento.Quantita) AS `QuantitaTot`, (-SUM(Movimento.Quantita)*Prezzo.Prezzo) AS `Totale` FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento = MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra = Birra.IdBirra
										JOIN Prezzo ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Ordine ON Ordine.IdOrdine = MovimentoUtente.IdUtente
										WHERE MovimentoUtente.IdOrdine = ?
										AND Prezzo.DaData < Ordine.DataOrdine
										AND Prezzo.AData > Ordine.DataOrdine
										GROUP BY Birra.IdBirra");
		$stmt->bind_param('i',$OrderId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);				
	}

	public function getUsedIVA() {
		$extractIVA = function($WrappedValue) {
			return $WrappedValue["PartitaIVA"];
		};		
		$stmt = $this->db->prepare ("	SELECT Birrificio.PartitaIVA FROM Birrificio
										WHERE Birrificio.PartitaIVA IS NOT NULL");
		$stmt->execute();
		$result = $stmt->get_result();
		$IVA = $result->fetch_all(MYSQLI_ASSOC);
		return array_map($extractIVA, $IVA);
	}

	public function requestSellerAccount($name, $email, $IVA) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Birrificio	(
																				NomeBirrificio,
																				EmailBirrificio,
																				PartitaIVA
																			)
																	values	(?, ?, ?)");
		$stmt->bind_param('sss',$name, $email, $IVA);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoMembershipBirrificio	(
																								IdBirrificio,
																								IdStatoMembership,
																								DaData,
																								AData
																							)
																					values	(
																								LAST_INSERT_ID(),
																								1,
																								NOW(),
																								?
																							)");
		$stmt->bind_param('s', $this->DistantFuture);
		return $stmt->execute();
	}

	public function getSellerFromRegistrationToken($token) {
		$stmt = $this->db->prepare ("	SELECT Birrificio.* FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio ON SMB.IdBirrificio=Birrificio.IdBirrificio
										WHERE SMB.IdStatoMembership=2
										AND SMB.Token=?
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('s',$token);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);				
	}

	public function completeSellerRegistration($SellerId, $password) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.StatoMembershipBirrificio AS SMB
										SET SMB.AData=NOW()
										WHERE SMB.IdBirrificio=?
										AND SMB.IdStatoMembership=2
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoMembershipBirrificio	(
																								IdBirrificio,
																								IdStatoMembership,
																								DaData,
																								AData
																							)
																					value	(
																								?,
																								4,
																								NOW(),
																								?
																							)");
		$stmt->bind_param('is',$SellerId, $this->DistantFuture);
		$stmt->execute();
		
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.PasswordBirrificio=?
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('si',$passwordHash, $SellerId);
		return $stmt->execute();
	}

	public function getSellerNotification($SellerId) {
		$stmt = $this->db->prepare ("	SELECT Notifica.* FROM Notifica
										WHERE Notifica.IdBirrificio=?
										AND Notifica.DataLettura > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		$result = $stmt->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);		
	}

	public function updateSellerAccountData($SellerId, $name, $email, $IVA) {				
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.NomeBirrificio=?,
											Birrificio.EmailBirrificio=?,
											Birrificio.PartitaIVA=?
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('sssi', $name, $email, $IVA, $SellerId);
		return $stmt->execute();
	}
	
	public function updateSellerPassword($SellerId, $password) {		
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.PasswordBirrificio=?
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('si', $passwordHash, $SellerId);
		return $stmt->execute();
	}

	public function deleteSeller($SellerId) {

		$beers = $this->getSellerBeer($SellerId);

		foreach ($beers as $beer) {
			$this->deleteBeer($beer["IdBirra"]);
		}

		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.NomeBirrificio=?,
											Birrificio.EmailBirrificio=CONCAT(?, '1', Birrificio.IdBirrificio),
											Birrificio.PartitaIVA=Birrificio.IdBirrificio,
											Birrificio.Localita=NULL,
											Birrificio.DescrizioneBirrificio=NULL,
											Birrificio.FotoBirrificio=NULL
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('ssi', $this->NamePlaceHolder, $this->EmailPlaceHolder, $SellerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	UPDATE birrazzone.StatoMembershipBirrificio AS SMB
										SET SMB.AData=NOW()
										WHERE SMB.IdBirrificio=?
										AND SMB.IdStatoMembership=4
										AND SMB.DaData <= NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoMembershipBirrificio	(
																								IdBirrificio,
																								IdStatoMembership,
																								DaData,
																								AData
																							)
																					value	(
																								?,
																								5,
																								NOW(),
																								?
																							)");
		$stmt->bind_param('is',$SellerId, $this->DistantFuture);

		return $stmt->execute();
	}

	public function updateSellerData($SellerId, $localita, $photo, $description) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birrificio
										SET Birrificio.Localita=?,
											Birrificio.FotoBirrificio=?,
											Birrificio.DescrizioneBirrificio=?
										WHERE Birrificio.IdBirrificio=?");
		$stmt->bind_param('sssi', $localita, $photo, $description, $SellerId);
		return $stmt->execute();
	}

	public function updateBeerData($BeerId, $foto, $price, $description) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Birra
										SET Birra.FotoBirra=?,
											Birra.DescrizioneBirra=?
										WHERE Birra.IdBirra=?");
		$stmt->bind_param('ssi', $foto, $description, $BeerId);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Prezzo
										SET Prezzo.AData=NOW()
										WHERE Prezzo.IdBirra=?
										AND Prezzo.DaData<NOW()
										AND Prezzo.AData>NOW()");
		$stmt->bind_param('i', $BeerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Prezzo	(
																			DaData,
																			AData,
																			Prezzo,
																			IdBirra
																		)
																values	(
																			NOW(),
																			?, ?, ?
																		)");
		$stmt->bind_param('sdi', $this->DistantFuture, $price, $BeerId);
		return $stmt->execute();
	}

	public function updateBeerQuantity($SellerId, $BeerId, $quantity) {		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Movimento	(
																				IdBirra,
																				DataMovimento,
																				Quantita,
																				TipoMovimento
																			)
																	values	(?, NOW(), ?, 2)");
		$stmt->bind_param('ii', $BeerId, $quantity);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.MovimentoBirrificio	(
																						IdMovimento,
																						IdBirrificio
																					)
																			values	(LAST_INSERT_ID(), ?)");
		$stmt->bind_param('i', $SellerId);
		return $stmt->execute();
	}

	public function addBeer($SellerId, $name, $type, $foto, $price, $format, $alchoolVolume, $color, $description) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Birra	(
																			NomeBirra,
																			Tipologia,
																			FotoBirra,
																			Formato,
																			GradoAlcolico,
																			Colore,
																			DescrizioneBirra,
																			IdBirrificio
																		)
																values	(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssddssi', $name, $type, $foto, $format, $alchoolVolume, $color, $description, $SellerId);
		$stmt->execute();

		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Prezzo	(
																			DaData,
																			AData,
																			Prezzo,
																			IdBirra
																		)
																values	(NOW(), ?, ?, LAST_INSERT_ID())");
		$stmt->bind_param('sd', $this->DistantFuture, $price);
		return $stmt->execute();
	}

	public function deleteBeer($BeerId) {
		$stmt = $this->db->prepare ("	UPDATE birrazzone.Prezzo
										SET Prezzo.AData=NOW()
										WHERE Prezzo.IdBirra=?
										AND Prezzo.DaData<NOW()
										AND Prezzo.AData>NOW()");
		$stmt->bind_param('i', $BeerId);
		$stmt->execute();
	}

	public function addAddress($Via, $Citta, $Provincia, $CAP) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Indirizzo 	(
																				Via,
																				Citta,
																				Provincia,
																				CAP
																			)
																	values	(?, ?, ?, ?)");
		$stmt->bind_param('ssss',$Via, $Citta, $Provincia, $CAP);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("SELECT LAST_INSERT_ID() AS ID");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC)[0];
	}

	public function finalizeOrder($UserId, $AddressId) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Ordine	(
																			IdIndirizzoSpedizione,
																			IdUtente,
																			DataOrdine
																		)
																values	(?, ?, NOW())");
		$stmt->bind_param('ii',$AddressId, $UserId);
		$stmt->execute();
		
		$stmt = $this->db->prepare ("SELECT LAST_INSERT_ID() AS ID");
		$stmt->execute();
		$result = $stmt->get_result();	

		$stmt = $this->db->prepare ("	UPDATE birrazzone.MovimentoUtente
										SET MovimentoUtente.IdOrdine=LAST_INSERT_ID()
										WHERE MovimentoUtente.IdOrdine IS NULL");
		$stmt->execute();
		
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoEvasioneOrdine	(
																						IdOrdine,
																						IdStatoOrdine,
																						DaData,
																						AData
																					)
																			values	(
																						LAST_INSERT_ID(),
																						1,
																						NOW(),
																						?
																					)");
		$stmt->bind_param('s',$this->DistantFuture);
		$stmt->execute();
		return $result->fetch_all(MYSQLI_ASSOC)[0];
	}

	public function addSellerNotification($SellerId, $NotificationType, $Title, $Body) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Notifica	(
																			IdBirrificio,
																			TipologiaNotifica,
																			Oggetto,
																			Corpo,
																			DataNotifica,
																			DataLettura
																		)
																values	(?, ?, ?, ?, NOW(), ?)");
		$stmt->bind_param('iisss',$SellerId, $NotificationType, $Title, $Body, $this->DistantFuture);
		return $stmt->execute();	
	}

	public function addUserNotification($UserId, $NotificationType, $Title, $Body) {
		$stmt = $this->db->prepare ("	INSERT INTO birrazzone.Notifica	(
																			IdUtente,
																			TipologiaNotifica,
																			Oggetto,
																			Corpo,
																			DataNotifica,
																			DataLettura
																		)
																values	(?, ?, ?, ?, NOW(), ?)");
		$stmt->bind_param('iisss',$UserId, $NotificationType, $Title, $Body, $this->DistantFuture);
		return $stmt->execute();	
	}

	public function getOpenOrders() {
		$stmt = $this->db->prepare ("	SELECT Ordine.*, SO.* FROM Ordine
										JOIN StatoEvasioneOrdine AS SEO ON SEO.IdOrdine = Ordine.IdOrdine
										JOIN StatoOrdine AS SO ON SEO.IdStatoOrdine = SO.IdStatoOrdine
										WHERE SEO.DaData <= NOW()
										AND SEO.AData > NOW()
										AND SEO.IdStatoOrdine < 4");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);	
	}

	public function advanceOrderStatus($OrderId) {
		$stmt = $this->db->prepare ("	SELECT Ordine.*, SO.* FROM Ordine
										JOIN StatoEvasioneOrdine AS SEO ON SEO.IdOrdine = Ordine.IdOrdine
										JOIN StatoOrdine AS SO ON SEO.IdStatoOrdine = SO.IdStatoOrdine
										WHERE Ordine.IdOrdine = ?
										AND SEO.DaData <= NOW()
										AND SEO.AData > NOW()");
		$stmt->bind_param('i',$OrderId);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC)[0];

		if($result["IdStatoOrdine"] < 4) {	
			$newStatus = $result["IdStatoOrdine"] + 1;
			$stmt = $this->db->prepare ("	UPDATE birrazzone.StatoEvasioneOrdine
											SET StatoEvasioneOrdine.AData=NOW()
											WHERE StatoEvasioneOrdine.IdOrdine=?
											AND StatoEvasioneOrdine.DaData <= NOW()
											AND StatoEvasioneOrdine.AData > NOW()");
			$stmt->bind_param('i',$OrderId);
			$stmt->execute();
			
			$stmt = $this->db->prepare ("	INSERT INTO birrazzone.StatoEvasioneOrdine	(
																							IdOrdine,
																							IdStatoOrdine,
																							DaData,
																							AData
																						)
																				values	( ?, ?, NOW(), ? )");
			$stmt->bind_param('iis',$OrderId, $newStatus, $this->DistantFuture);
			return $stmt->execute();
		} else {
			return false;
		}
	}
}
	
?>