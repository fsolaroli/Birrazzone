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
									PasswordUtente
								)
						values	(
									1,
									"Cicciopizzo Brullo",
									"cicciopizzo.brullo@example.com",
									"password"
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
												1,
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
										20,
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
										'2020-12-28 15:00:00',
										5,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente,
											IdOrdine
										)
								values	(
											2,
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
										3,
										1,
										'2020-12-28 15:10:00',
										1,
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
										'2020-12-28 15:15:00',
										10,
										1
									);

insert into birrazzone.MovimentoUtente	(
											IdMovimento,
											IdUtente
										)
								values	(
											4,
											1
										);