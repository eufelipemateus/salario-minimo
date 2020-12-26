CREATE TABLE "salarioanodbs" (
	"ID"	INTEGER NOT NULL,
	"ano"	TEXT NOT NULL,
	"vigencia"	VARCHAR(150) NOT NULL,
	"valor"	REAL(8, 2),
	"atoLegal"	TEXT,
	PRIMARY KEY("ID" AUTOINCREMENT)
)