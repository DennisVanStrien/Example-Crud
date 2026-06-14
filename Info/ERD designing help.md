## Relaties in databases (ERD-design) + handige manieren om het snel goed te bepalen

Een **relatie** beschrijft hoe tabellen (entiteiten) aan elkaar gekoppeld zijn. In een **ERD** teken je die koppelingen met **kraaienpootjes (crow’s foot)** en je implementeert ze met **primary keys (PK)** en **foreign keys (FK)**.

---

## Snelle ERD-regels (de “cheat sheet”)

### Waar zet je de foreign key?
- Bij **1:N (one-to-many)** staat de **FK altijd aan de N-kant** (de “many” / child tabel).
- Bij **N:M (many-to-many)** maak je een **koppeltabel**: daarin staan **twee FK’s** (naar beide tabellen).
- Bij **1:1 (one-to-one)** zet je de FK in de tabel die logisch “aanvullend” is en maak je die FK **UNIQUE** (of PK=FK).

---

## Stap-voor-stap methode om relaties te bepalen (makkelijk uitvinden)

### Stap 1: Zeg het in een zin
Neem twee entiteiten A en B, en zeg hardop:

- “Een **A** heeft … **B**”
- “Een **B** hoort bij … **A**”

Voorbeeld `Customer` en `Order`:
- “Een customer heeft veel orders.”
- “Een order hoort bij precies één customer.”

Daaruit volgt: `Customer` 1 → N `Order`.

### Stap 2: Gebruik de “hoeveel?” vragen (cardinaliteit)
Stel per kant:
- Voor **één A**, hoeveel **B** kunnen er zijn? (0, 1, veel)
- Voor **één B**, hoeveel **A** kunnen er zijn? (0, 1, veel)

Als één kant “veel” is en de andere kant “1”, dan heb je **1:N**.

### Stap 3: Bepaal optionaliteit met “mag het ontbreken?”
- “Kan B bestaan zonder A?”
  - Nee → FK is `NOT NULL`
  - Ja → FK is `NULL` toegestaan

Voorbeeld:
- “Kan een order bestaan zonder customer?” meestal nee → `Order.customer_id NOT NULL`.

---

## Hoe weet je welke kant “one-to-many” is (en welke “many-to-one”)?

Het zijn hetzelfde, alleen vanuit een ander perspectief:

- **One-to-many**: van **parent** naar **children**
  - `Customer` → `Order` (1 customer heeft veel orders)
- **Many-to-one**: van **child** naar **parent**
  - `Order` → `Customer` (veel orders horen bij één customer)

### Superpraktische regel
De tabel die de **FK bevat** is bijna altijd de **many-to-one kant** (de child wijst naar de parent).

Dus:
- Als `Order` de FK `customer_id` heeft → `Order` is **many-to-one** richting `Customer`.
- En `Customer` is **one-to-many** richting `Order`.

---

## Hoe vind je snel waar de FK moet staan?

### Regel: “Wie kan er niet zonder wie?”
De tabel die “afhankelijk” is van de ander krijgt de FK.

Voorbeeld:
- Een `Order` is afhankelijk van een `Customer` → FK in `Order`.

### Regel: “Wie is het detailrecord?”
De detailtabel (regels/items/logs) krijgt bijna altijd de FK.

Voorbeelden:
- `InvoiceLine` krijgt FK naar `Invoice`
- `Comment` krijgt FK naar `Post`
- `LogEntry` krijgt FK naar `System`

### Regel: “Waar staat de herhaling?”
Als je anders herhaalde waarden moet opslaan, dan zit je fout.
- Als je meerdere `product_id` kolommen in `Order` zou willen (`product1_id`, `product2_id`, …), dan is het eigenlijk **N:M** → gebruik een koppeltabel (`OrderItem`).

---

## Beslisboom: is het 1:N of N:M?

### Testvraag
“Kan één A met meerdere B’s gekoppeld zijn?”  
en óók:  
“Kan één B met meerdere A’s gekoppeld zijn?”

- Als **allebei ja** → **N:M** (koppeltabel nodig)
- Als maar één kant ja → **1:N**
- Als allebei “max 1” → **1:1**

Voorbeeld:
- `Order` ↔ `Product`: beide kanten ja → N:M → `OrderItem`.

---

## Crow’s foot (kraaienpoot) lezen in normale taal

Je kijkt per kant naar:
- `|` = exact 1
- `o` = optioneel (0)
- kraaienpoot = veel (N)

Voorbeeld-interpretatie:
- Aan de `Order`-kant een kraaienpoot: één `Customer` → veel `Order`s
- Aan de `Customer`-kant een `|`: elke `Order` → precies één `Customer` (als mandatory)

---

## Praktische voorbeelden (met “hoe kom je erachter?”)

### Voorbeeld 1: Customer en Order (1:N)
Zinnen:
- “Een customer kan meerdere orders hebben.” → veel
- “Een order hoort bij één customer.” → 1

Conclusie:
- `Customer` 1 → N `Order`
- FK: `Order.customer_id`

### Voorbeeld 2: Student en Course (N:M)
Zinnen:
- “Een student volgt meerdere courses.” → veel
- “Een course heeft meerdere studenten.” → veel

Conclusie:
- N:M → koppeltabel `Enrollment(student_id, course_id, ...)`

### Voorbeeld 3: User en UserProfile (1:1)
Zinnen:
- “Een user heeft maximaal één profiel.” → max 1
- “Een profiel hoort bij één user.” → 1

Conclusie:
- 1:1 → `UserProfile.user_id` als FK en `UNIQUE` (of PK=FK)

---

## Extra tips die het ontwerpen makkelijker maken

### Tip 1: Teken eerst zonder FK’s, voeg ze pas daarna toe
Eerst: entiteiten + relaties + cardinaliteit.  
Daarna: bedenk pas “waar komt de FK”.

### Tip 2: Gebruik betekenisvolle namen voor FK’s
- `customer_id`, `order_id`, `product_id` (consistent)
- Vermijd vage namen zoals `ref_id`.

### Tip 3: Denk na over delete-regels
- `RESTRICT` is vaak veilig voor belangrijke parent-tabellen (Customer)
- `CASCADE` is vaak logisch voor echte child-data (Order → OrderItem)



## Koppeltabel (junction/associative table): wanneer gebruik je die?

Je gebruikt een **koppeltabel** wanneer je een **many-to-many (N:M)** relatie hebt, of wanneer je **extra data op de relatie zelf** moet opslaan.

### Herkenningsregels (heel praktisch)

1. **Beide kanten kunnen “veel” zijn**
   - “Een `Order` heeft veel `Product`s” én “een `Product` kan in veel `Order`s zitten”  
   → dat is **N:M** → **koppeltabel**.

2. **Je wil attributen opslaan die bij de relatie horen**
   - Voorbeeld: `quantity`, `price_at_time`, `role`, `assigned_at`, `status`  
   Deze horen niet “bij Order” of “bij Product”, maar **bij de combinatie**.
   → **koppeltabel** (associative entity).

3. **Je merkt dat je kolommen zou gaan herhalen**
   - Zoals `product1_id`, `product2_id`, `product3_id` in `Order`  
   → dat is een signaal dat je eigenlijk een 1:N-tabel nodig hebt (koppeltabel / detailregels).

### Voorbeeld: Order ↔ Product via OrderItem

```sql
CREATE TABLE Product (
  product_id INT PRIMARY KEY,
  name TEXT NOT NULL
);

CREATE TABLE "Order" (
  order_id INT PRIMARY KEY,
  order_date DATE NOT NULL
);

-- Koppeltabel
CREATE TABLE OrderItem (
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,

  -- vaak een samengestelde PK, zodat dezelfde combinatie niet dubbel voorkomt
  PRIMARY KEY (order_id, product_id),

  FOREIGN KEY (order_id) REFERENCES "Order"(order_id),
  FOREIGN KEY (product_id) REFERENCES Product(product_id)
);
```

### Welke primary key kies je in de koppeltabel?

- **Samengestelde PK** (`PRIMARY KEY (a_id, b_id)`) is ideaal als:
  - één combinatie maar één keer mag voorkomen (meestal zo)
  - je geen “los” ID nodig hebt

- **Surrogate key** (bijv. `order_item_id`) is handig als:
  - je naar de koppeltabel wilt verwijzen vanuit andere tabellen
  - je meerdere regels met dezelfde combinatie wilt toestaan (bv. history/versies)
  - je tooling/ORM beter werkt met één kolom als PK

Tip: als je een surrogate key gebruikt, zet dan vaak alsnog een `UNIQUE (order_id, product_id)` om dubbels te voorkomen.

---

## Andere handige ERD-dingen (sneller beter ontwerp)

## Optionaliteit (0 of 1) bepalen met één vraag
Vraag: **“Kan de child bestaan zonder de parent?”**

- Nee → FK `NOT NULL` (mandatory relatie)
- Ja → FK mag `NULL` (optioneel)

Voorbeeld:
- `Order.customer_id` meestal `NOT NULL`
- `Employee.manager_id` vaak `NULL` toegestaan

---

## “Identifying” vs “non-identifying” relatie (handig bij tekenen)

- **Identifying relationship**: de PK van de child bevat (een deel van) de PK van de parent  
  - Vaak bij detailregels of sterke afhankelijkheid
  - Voorbeeld: `OrderItem` met `PRIMARY KEY (order_id, product_id)`  
  De relatie “zit in” de identiteit.

- **Non-identifying relationship**: child heeft eigen PK, en FK is “gewoon een veld”  
  - Voorbeeld: `Order(order_id PK, customer_id FK)`

Veel ERD-tools tekenen dit met een ander lijntype; conceptueel helpt het om te bepalen of de child “echt” zonder parent kan bestaan.

---

## Uniques als business rules (ERD is niet alleen cardinaliteit)
Soms is de relatie logisch 1:N, maar wil je een extra regel afdwingen met `UNIQUE`.

Voorbeelden:
- “Elke user heeft maximaal één profile”  
  → FK + `UNIQUE` (1:1 afdwingen)
- “Een email mag maar één keer voorkomen”  
  → `UNIQUE(email)`

---

## Normalisatie-signalen (wanneer splits je tabellen?)
Snelle signalen dat je moet herstructureren:

- Je ziet **herhalende groepen** (“adres1, adres2, adres3”)  
  → aparte tabel (`Address`) met 1:N
- Je slaat **meerdere waarden in één veld** (“tag1,tag2,tag3”)  
  → N:M met koppeltabel (`PostTag`)
- Je hebt veel `NULL`-kolommen die maar voor sommige types gelden  
  → overweeg subtype-tabellen (bijv. `PaymentCardDetails`, `PaymentIdealDetails`)

---

## Cardinaliteit check: “wat gebeurt er als ik er 2 wil?”
Een snelle sanity check: neem één record en vraag:

- “Mag ik er **twee** van deze aan koppelen?”
- “Zo ja, moet ik ze apart kunnen beheren (eigen data/velden)?”
  - Zo ja → waarschijnlijk een echte tabel (en dus 1:N of N:M)
  - Zo nee → misschien is het gewoon een attribuut

---

## Index & performance tip (klein maar belangrijk)
- Zet (bij grotere tabellen) meestal een **index op FK-kolommen**, omdat je daar vaak op joint/filtert.
- Veel databases indexen FKs niet automatisch.
