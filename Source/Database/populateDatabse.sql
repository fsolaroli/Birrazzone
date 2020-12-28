-- insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (1, 'INVIATA',		'In approvazione');

insert into birrazzone.Birrificio	(
										IdBirrificio,
										NomeBirrificio,
										EmailBirrificio,
										PasswordBirrificio,
										PartitaIVA,
										Localita,
										DescrizioneBirrificio,
										FotoBirrificio
									)
							values	(
										1,
										"Ca' del Brado",
										"CaDelBrado@example.com",
										"password",
										"10101010101",
										"Rastignano, BO",
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent auctor, dolor in cursus tempor, ipsum nisi consequat orci, ac tempor libero velit vitae tortor. Suspendisse vel nisi fringilla ligula.",
										"CaDelBrado"
									);

insert into birrazzone.StatoMembershipBirrificio	(
														IdBirrificio,
														IdStatoMembership,
														DaData,
														AData	
													)
											values	(
														1,
														4,
														'2020-12-20 10:20:40',
														'4000-01-01 00:00:00'
													);

insert into birrazzone.Birra	(
									IdBirra,
									NomeBirra,
									Tipologia,
									Formato,
									GradoAlcolico,
									Colore,
									DescrizioneBirra,
									FotoBirra,
									IdBirrificio
								) 
						values	(
									1,
									"Pié Veloce",
									"Lambicus",
									50,
									3.9,
									"Scura",
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula enim, convallis non suscipit sed, venenatis quis magna. Suspendisse vel ultricies elit, ut sollicitudin ex. Donec purus justo justo.",
									"pie-veloce-brux.png",
									1
								);

insert into birrazzone.Prezzo	(
									DaData,
									AData,
									Prezzo,
									IdBirra
								)
						values	(
									'2020-12-20 12:00:00',
									"4000-01-01 00:00:00",
									15.5,
									1
								);