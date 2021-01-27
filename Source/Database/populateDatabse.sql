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
										"$2y$10$IEs1A7Cqg5ouzH4Td524T.3ETJKh9aTqsuxykC8FghQvQ20WHB4ae",
										"10101010101",
										"Rastignano, BO",
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent auctor, dolor in cursus tempor, ipsum nisi consequat orci, ac tempor libero velit vitae tortor. Suspendisse vel nisi fringilla ligula.",
										"CaDelBrado.jpeg"
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
										2,
										"Brewfist",
										"Brewfist@example.com",
										"$2y$10$ixdVeNabVGWPXvK5PkL21.QmrJYE80Xbpfg4bxwxcF9wOp4MWNwEW",
										"11111110101",
										"Codogno, LO",
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent auctor, dolor in cursus tempor, ipsum nisi consequat orci, ac tempor libero velit vitae tortor. Suspendisse vel nisi fringilla ligula.",
										"Brewfist.jpg"
									);

insert into birrazzone.StatoMembershipBirrificio	(
														IdBirrificio,
														IdStatoMembership,
														DaData,
														AData	
													)
											values	(
														2,
														4,
														'2020-12-20 10:20:40',
														'4000-01-01 00:00:00'
													);

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
										3,
										"Dòg E Trì",
										"DogETri@example.com",
										"$2y$10$sf605xTN4bxqnjV9Ag77y.tQTpLU/qS5Tqd0mW9mSjxvOo2xLwAmO",
										"12345678901",
										"Medicina, BO",
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent auctor, dolor in cursus tempor, ipsum nisi consequat orci, ac tempor libero velit vitae tortor. Suspendisse vel nisi fringilla ligula.",
										"DogETri.jpg"
									);

insert into birrazzone.StatoMembershipBirrificio	(
														IdBirrificio,
														IdStatoMembership,
														DaData,
														AData	
													)
											values	(
														3,
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
									2,
									"Nessun Dorma",
									"Sour Ale",
									50,
									6.4,
									"Ambrata",
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula enim, convallis non suscipit sed, venenatis quis magna. Suspendisse vel ultricies elit, ut sollicitudin ex. Donec purus justo justo.",
									"nessun-dorma.jpg",
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
									8.5,
									2
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
									3,
									"Spaceman",
									"West Coast IPA",
									33,
									7.0,
									"Chiara",
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula enim, convallis non suscipit sed, venenatis quis magna. Suspendisse vel ultricies elit, ut sollicitudin ex. Donec purus justo justo.",
									"birra-spaceman.png",
									2
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
									10,
									3
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
									4,
									"Il Montante",
									"Doppelbock",
									33,
									7.3,
									"Ambrata",
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula enim, convallis non suscipit sed, venenatis quis magna. Suspendisse vel ultricies elit, ut sollicitudin ex. Donec purus justo justo.",
									"birra-montante.png",
									2
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
									13,
									4
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
									5,
									"Birra 038",
									"Citra",
									50,
									5.5,
									"Chiara",
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula enim, convallis non suscipit sed, venenatis quis magna. Suspendisse vel ultricies elit, ut sollicitudin ex. Donec purus justo justo.",
									"birra-038.jpeg",
									3
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
									12.5,
									5
								);

insert into birrazzone.Indirizzo	(
										IdIndirizzo,
										Via,
										Citta,
										Provincia,
										CAP
									)
							values	(
										1,
										"Via Giampiero Combi, 100",
										"Roma",
										"RM",
										"00142"
									);

insert into birrazzone.Utente	(
									IdUtente,
									NomeUtente,
									EmailUtente,
									PasswordUtente,
									IdIndirizzo
								)
						values	(
									1,
									"Cicciopizzo Brullo",
									"cicciopizzo.brullo@example.com",
									"$2y$10$f3OTXsRPeuVNJfiKoqarzu953nCcmtfEBnend1L1v.uPmBEMqZxUS",
									1
								);

insert into birrazzone.Utente	(
									IdUtente,
									NomeUtente,
									EmailUtente,
									PasswordUtente
								)
						values	(
									2,
									"Gennaro Bullo",
									"gennaro.bullo@example.com",
									"$2y$10$SuroG/OchgTZm1AO4uRgv.vZGycCTje5A6SP33jOZaiIKvuBGJekS"
								);

insert into birrazzone.Ordine	(
									IdOrdine,
									IdIndirizzoSpedizione,
									IdUtente,
									DataOrdine
								)
						values	(
									1,
									1,
									1,
									'2020-12-28 14:00:00'
								);

insert into birrazzone.StatoEvasioneOrdine	(
												IdOrdine,
												IdStatoOrdine,
												DaData,
												AData
											)
									values	(
												1,
												4,
												'2020-12-28 14:00:05',
												'4000-01-01 00:00:00'
											);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										1,
										1,
										'2020-12-28 13:00:00',
										-20,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente,
											IdOrdine
										)
								values	(
											1,
											1,
											1
										);

insert into birrazzone.Ordine	(
									IdOrdine,
									IdIndirizzoSpedizione,
									IdUtente,
									DataOrdine
								)
						values	(
									2,
									1,
									1,
									'2020-12-28 17:00:00'
								);

insert into birrazzone.StatoEvasioneOrdine	(
												IdOrdine,
												IdStatoOrdine,
												DaData,
												AData
											)
									values	(
												2,
												1,
												'2020-12-28 17:00:05',
												'4000-01-01 00:00:00'
											);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										2,
										1,
										'2020-11-28 15:00:00',
										200,
										2
									);

insert into birrazzone.MovimentoBirrificio	(
											IdMovimento,
											IdBirrificio
										)
								values	(
											2,
											1
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										3,
										1,
										'2020-12-28 15:00:00',
										-5,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente,
											IdOrdine
										)
								values	(
											3,
											1,
											2
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										4,
										1,
										'2020-12-28 15:10:00',
										-1,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente,
											IdOrdine
										)
								values	(
											4,
											1,
											2
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										5,
										1,
										'2020-12-28 15:15:00',
										-10,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente
										)
								values	(
											5,
											1
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										6,
										1,
										'2020-12-28 15:15:00',
										-10,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente
										)
								values	(
											6,
											1
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										7,
										2,
										'2020-11-28 15:00:00',
										150,
										2
									);

insert into birrazzone.MovimentoBirrificio	(
											IdMovimento,
											IdBirrificio
										)
								values	(
											7,
											1
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										8,
										3,
										'2020-11-28 15:00:00',
										175,
										2
									);

insert into birrazzone.MovimentoBirrificio	(
											IdMovimento,
											IdBirrificio
										)
								values	(
											8,
											2
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										9,
										4,
										'2020-11-28 15:00:00',
										115,
										2
									);

insert into birrazzone.MovimentoBirrificio	(
											IdMovimento,
											IdBirrificio
										)
								values	(
											9,
											2
										);

insert into birrazzone.Movimento	(
										IdMovimento,
										IdBirra,
										DataMovimento,
										Quantita,
										TipoMovimento
									)
							values	(
										10,
										5,
										'2020-11-28 15:00:00',
										250,
										2
									);

insert into birrazzone.MovimentoBirrificio	(
											IdMovimento,
											IdBirrificio
										)
								values	(
											10,
											3
										);