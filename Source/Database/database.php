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

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
	}

	public function getRandomBeer($n=4) {
		$stmt = $this->db->prepare	("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Prezzo.IdBirra=Birra.IdBirra
										JOIN Birrificio ON Birra.IdBirrificio=Birrificio.IdBirrificio
										WHERE Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()
										ORDER BY RAND()
										LIMIT ?");
		$stmt->bind_param('i',$n);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getRandomSeller($n=4) {
		$stmt = $this->db->prepare	("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.DescrizioneBirrificio, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE SM.Codice='ATTIVA'
										AND SMB.DaData < NOW()
										AND SMB.AData > NOW()
										ORDER BY RAND()
										LIMIT ?");
		$stmt->bind_param('i',$n);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function searchBeer($searchTag) {

		// POSSIBLE TODO
		// $dataToReplace = [1 => 'one', 2 => 'two', 3 => 'three'];
		// $sqlReplace = '';
		// foreach ($dataToReplace as $key => $val) {
		// 	$sqlReplace = 'REPLACE(' . ($sqlReplace ? $sqlReplace : 'replace_field') . ', "' . $key . '", "' . $val . '")';
		// }

		$stmt = $this->db->prepare	("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirra
										WHERE LOCATE(?, Birra.NomeBirra)!=0
										OR LOCATE(?, Birrificio.NomeBirrificio)!=0
										AND Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('ss',$searchTag, $searchTag);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function searchSeller($searchTag) {
		$stmt = $this->db->prepare	("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE LOCATE(?, B.NomeBirrificio)!=0
										AND SM.Codice='ATTIVA'
										AND SMB.DaData < NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('s',$searchTag);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getBeer($BeerId) {
		$stmt = $this->db->prepare	("	SELECT Birra.*, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirra
										WHERE Birra.IdBirra=?
										AND Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('i',$BeerId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getSeller($SellerId) {
		// $stmt = $this->db->prepare	("	SELECT B.IdBirrificio, B.NomeBirrificio, B.Localita, B.DescrizioneBirrificio, B.FotoBirrificio FROM StatoMembershipBirrificio AS SMB
		$stmt = $this->db->prepare	("	SELECT B.* FROM StatoMembershipBirrificio AS SMB
										JOIN Birrificio AS B ON B.IdBirrificio=SMB.IdBirrificio
										JOIN StatoMembership AS SM ON SM.IdStatoMembership=SMB.IdStatoMembership
										WHERE B.IdBirrificio=?
										AND SM.Codice='ATTIVA'
										AND SMB.DaData < NOW()
										AND SMB.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getSellerBeer($SellerId) {
		$stmt = $this->db->prepare	("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Birrificio.NomeBirrificio, Prezzo.Prezzo FROM Prezzo
										JOIN Birra ON Birra.IdBirra = Prezzo.IdBirra
										JOIN Birrificio ON Birrificio.IdBirrificio = Birra.IdBirra
										WHERE Birra.IdBirrificio=?
										AND Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()");
		$stmt->bind_param('i',$SellerId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getBestSellerBeer($SellerId, $n=4) {
		$stmt = $this->db->prepare	("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.Tipologia, Birra.Formato, Birra.FotoBirra, Prezzo.Prezzo FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra=Birra.IdBirra
										JOIN Prezzo ON Birra.IdBirra = Prezzo.IdBirra
										WHERE Birra.IdBirrificio=?
										AND MovimentoUtente.IdOrdine IS NOT NULL
										AND Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()
										GROUP BY Birra.IdBirra
										ORDER BY SUM(Movimento.Quantita) DESC
										LIMIT ?");
		$stmt->bind_param('ii',$SellerId, $n);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);		
	}

	public function getShoppingCart($UserId) {
		$stmt = $this->db->prepare	("	SELECT Birra.IdBirra, Birra.NomeBirra, Birra.FotoBirra, Prezzo.Prezzo, SUM(Movimento.Quantita) AS `QuantitaTot`, (SUM(Movimento.Quantita)*Prezzo.Prezzo) AS `Totale` FROM MovimentoUtente
										JOIN Movimento ON Movimento.IdMovimento=MovimentoUtente.IdMovimento
										JOIN Birra ON Movimento.IdBirra=Birra.IdBirra
										JOIN Prezzo ON Birra.IdBirra = Prezzo.IdBirra
										WHERE MovimentoUtente.IdUtente=?
										AND MovimentoUtente.IdOrdine IS NULL
										AND Prezzo.DaData < NOW()
										AND Prezzo.AData > NOW()
										GROUP BY Birra.IdBirra");
		$stmt->bind_param('i',$UserId);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);		
	}

}
	
?>