## Flowchart vs activiteiten diagram (UML) — wanneer gebruik je wat?

Een **flowchart** en een **activiteiten diagram** lijken op elkaar omdat ze allebei een proces met stappen en beslissingen tonen. Het verschil zit vooral in **doel**, **detailniveau** en **voor wie** je het maakt.

---

## Flowchart (beslisboom / stappenplan)

Een **flowchart** is een **algemeen** procesdiagram: laagdrempelig en makkelijk te lezen.

### Waarvoor gebruik je het?
- Als **werkinstructie** of **beslisboom**
- Voor **support/klantenservice**, operations, onboarding, simpele procedures
- Voor processen die je vooral “snel duidelijk” wil maken

### Kenmerken
- Meestal **lineaire stappen** met een paar keuzes (ja/nee)
- Minder focus op formele UML-regels
- Duidelijk voor mensen die niet per se technisch zijn

### Voorbeeld in woorden
“Is de klant ingelogd?” → ja/nee → volgende stap.

---

## Activiteiten diagram (UML Activity Diagram)

Een **activiteiten diagram** is een **formeler UML-diagram** om processen te modelleren, vaak richting software-ontwerp.

### Waarvoor gebruik je het?
- Om te tonen **hoe een proces moet lopen** binnen een systeem of organisatie
- Wanneer je wil laten zien:
  - **wie wat doet** (rollen/actors)
  - **parallelle stappen** (dingen die tegelijk gebeuren)
  - duidelijke “flow” inclusief uitzonderingen

### Kenmerken
- Kan werken met **swimlanes** (bijv. Klant / Systeem / Admin / Payment provider)
- Sterk in processen met meerdere betrokken partijen
- Handig als basis voor implementatie en testen

### Voorbeeld in woorden
Klant doet actie → systeem reserveert voorraad → payment provider bevestigt → systeem maakt order aan  
(en sommige stappen kunnen tegelijk lopen).

---

## Is een flowchart “persoon-gericht” en een activiteiten diagram “applicatie-gericht”?

**Vaak wel in de praktijk**, maar het is geen harde regel.

### Beter onderscheid
- **Flowchart**: vooral bedoeld als **simpel stappenplan** (“wat moet ik nu doen?”)
- **Activiteiten diagram**: vooral bedoeld als **procesmodel** (“hoe werkt het proces end-to-end, door wie, en eventueel tegelijk?”)

Dus: flowcharts worden vaak gebruikt door mensen (zoals klantenservice), en activity diagrams vaak voor applicatie/process ontwerp, maar beide kunnen in theorie over mens én systeem gaan.

---

## Snelle keuzehulp

Kies een **flowchart** als:
- je een **makkelijk te volgen beslisboom** nodig hebt
- het proces simpel is en vooral bedoeld is als handleiding

Kies een **activiteiten diagram** als:
- er **meerdere rollen** zijn (user/systeem/admin/extern)
- er **parallelle stappen** zijn
- je het proces wilt gebruiken voor **ontwerp/implementatie/testen**

---

## Moet je altijd allebei hebben?

Nee. Bij een kleinere applicatie is **één goed diagram** meestal beter dan twee half uitgewerkte. Gebruik alleen beide als ze echt verschillende doelgroepen bedienen (bijv. flowchart voor support + activity diagram voor developers).
