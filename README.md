# SAE23 site web pour hopital
[Paul TARDIEU](@Paul-Tardieu)<br>
[Moeana MOEHAMADDOELLAH](@moeanamoeh)<br><br>

## Sommaire:
<br>

- [Organisation base de donnée](#organisation-base-de-donnée)<br>

- [Rappel github](#rappel-commande-github)

- [Organisation siteweb](#organisation-site-web)


<br><u>

---

## Organisation site web<br></u>
### Le site web est divisé en X parties:<br><br>
- L'accueil:<br>
<p style='text-indent: 4.5em;'>page simple contenant des infos sur l'hopital
<br><br>

- Espace Pro:<br>
<p style='text-indent: 4.5em;'>page de connexion et de création de compte destinée aux employés
<br><br>

- Rendez-vous:<br>
<p style='text-indent: 4.5em;'>sous page après connexion d'un compte status:"accueil"<br>
<p style='text-indent: 4.5em;'>permet changement de MDP et la prise de rendez vous d'un patient
<br><br>

- Planning:<br>
<p style='text-indent: 4.5em;'>sous page après connexion d'un compte status:"docteur"<br>
<p style='text-indent: 4.5em;'>permet changement de MDP et la consultation des rendez vous assignés
<br><br>

- Admin:<br>
<p style='text-indent: 4.5em;'>sous page après connexion d'un compte admin:true<br>
<p style='text-indent: 4.5em;'>permet changement de MDP du compte
<p style='text-indent: 4.5em;'>la modification des données de toutes les tables sauf table log et autre compte admin<br>

<br><br><br><u>

---

## Organisation base de donnée<br></u>

### Tables:
- Users

| pkey | prenom | nom | mail | MDP | status | admin |
|-------|-------|-------|-------|-------|-------|-------|
|0|Paul|Tardieu|tardieu.paul@gmail.com|aMs#4rt|dev|true|
|1|Moeana|Moehama|moeanamoehamad@gmail.com|T3gQ#0x|dev|true|
|2|Steven|Strange|steven.strange@gmail.com|agamoto|docteur|false|
|3|Clara|Delaville|clara.delaville@gmail.com|abcdef|accueil|false|
<br>
- Patients

| pkey | prenom | nom | birthdate | num_secu | a_un_RDV |
|-------|-------|-------|-------|-------|-------|
|0|Philippe|Darut|19/09/1993|56789|false|
|1|Christelle|Lafont|31/01/1985|01234|true|
<br>
- RDV

| pkey | pkey_patients |Date_RDV| salle | heure | pkey_users |
|-------|-------|-------|-------|-------|-------|
|0|1|15/06/2023|B202|16:30|2|
<br><br><br>

---

<u><H3>
## Rappel commande github
</H3></u>

### Pour copier le repository entier vers son pc:

    git clone <url du dossier github>

### Pour ajouter des changements ou des fichiers:<br>
attention: ctrl S avant manip<br>

    1 git add .
    2 git comit -m " ajout de <fichier>"
    3 git psuh

### Pour mettre à jour le repository:<br>

    git pull