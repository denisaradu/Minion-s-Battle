# Minion-s-Battle
Am facut un mic joculet ce simuleaza o batalie intre un minion Tim si un minion malefic, Evil.
Folosind HTML, CSS, JavaScript, am simulat batalia intr-un web browser. Codul bataliei propriu-zise este scris in PHP. Am folosit XAMPP pentru a vizualiza site-ul pe un server local si a interpreta scriptul scris in PHP.

Regulile "jocului" sunt urmatoarele:
- atat Tim, cat si Evil primesc atributele Health, Strength, Defense, Speed, Luck, initilizate cu valori aleatoare;
- Tim are 2 skill-uri in batalie ce le poate folosi: 
   1) Banana Strike: ataca de 2 ori cand ii vine randul, avand o sansa de 10% de a folosi acest skill cand ataca
   2) Umbrella Shield: primeste doar jumatate de damage de la atacul lui Evil, avand o sansa de 20% de a folosi acest skill cand este atacat;
- primul atac este initiat de minionul cu atributul Speed cel mai mare; daca au aceeasi viteza, va ataca cel cu Luck mai mare;
- dupa oricare atac, se schimba rolurile: cel care ataca va fi acum atacat si invers;
- Damage-ul primit este calculat dupa formula: Damage = Attacker Strength - Defender Defense; din Health se scade acest Damage;
- cel care ataca poate sa rateze si sa nu faca niciun Damage daca cel atacat este mai norocos(are Luck mai mare) la acea runda;

Jocul se termina cand unul dintre minioni ramane fara Health, sau daca au trecut mai mult de 20 de runde. La fiecare runda se specifica ce s-a intamplat, ce skill-uri au fost utilizate, cat Damage s-a facut si se declara un castigator la final.

Apasand butonul "Battle Start", se porneste jocul, initializandu-se aleator valorile si descriindu-se batalia, alegandu-se la final un castigator.
In "History" se retin datele fiecarei batalii care a avut loc apasandu-se butonul de "Start Battle". Se salveaza fiecare batalie in parte, inclusiv ora la care a avut loc.
Butonul "Reset" reseteaza jocul, stergand toate datele retinute in istoric.
